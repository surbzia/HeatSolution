<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsletterRequest;
use App\Http\Resources\NewsletterResource;
use App\Mail\Public\AdminSubscriptionEmail;
use App\Mail\Public\SubscriptionEmail;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Stripe\Subscription;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('viewAny', Newsletter::class);
        if (isset($_GET['sortCol'])) {
            $newsletters = Newsletter::orderBy($_GET['sortCol'], ($_GET['sortByDesc'] == 1 ? 'desc' : 'asc'));
        } else {
            $newsletters = Newsletter::orderBy('newsletters.id', 'desc');
        }
        if (!empty($_GET['search'])) {
            $newsletters = $newsletters->Where(
                function ($query) {
                    $q = $_GET['search'];
                    $query->orWhere('newsletters.email', 'like', '%' . $q . '%');
                }
            );
        }
        if (isset($_GET['perpage']) && intval($_GET['perpage']) > 0) {
            $newsletters = $newsletters->paginate($_GET['perpage']);
        } else {
            $newsletters = $newsletters->get();
        }
        return NewsletterResource::collection($newsletters);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsletterRequest $request)
    {
        // Gate::authorize('create',Newsletter::class);
        $newsletter = Newsletter::create($request->only('email'));
        Mail::to($newsletter->email)->send(new SubscriptionEmail($newsletter->email));
        Mail::to($newsletter->email)->send(new AdminSubscriptionEmail($newsletter->email));
        return new NewsletterResource(['success' => true, 'data' => $newsletter]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        Gate::authorize('view', $newsletter);
        return new NewsletterResource($newsletter);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
