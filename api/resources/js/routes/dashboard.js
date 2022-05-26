import admin from '@/middleware/admin'
export default [
	{
        path: '/dashboard',
        name: 'auth.dashboard',
        component: () => import('@/views/Panel.vue'),
    },
    {
        path: '/notifications',
        name: 'auth.notifications',
        component: () => import('@/views/Notifications.vue'),
    },
    {
        path: '/profile',
        name: 'auth.profile',
        component: () => import('@/views/Profile.vue'),
    },
    {
        path: '/roles/',
        name: 'auth.roles',
        component: ()=> import('@/views/Role/Main.vue'),
        children: [
            {
                path: '',
                component: ()=> import('@/views/Role/List.vue'),
                name: 'auth.roles.listing'
            },
            {
                path: 'add',
                component: ()=> import('@/views/Role/Form.vue'),
                name: 'auth.roles.add'
            },
            {
                path: 'edit/:id',
                component: ()=> import('@/views/Role/Form.vue'),
                name: 'auth.roles.edit'
            }
        ],
        beforeEnter: admin,
    },
    {
        path: '/permissions/',
        name: 'auth.permissions',
        component: ()=> import('@/views/Permission/Main.vue'),
        children: [
            {
                path: '',
                component: ()=> import('@/views/Permission/List.vue'),
                name: 'auth.permissions.listing'
            },
            {
                path: 'add',
                component: ()=> import('@/views/Permission/Form.vue'),
                name: 'auth.permissions.add'
            },
            {
                path: 'edit/:id',
                component: ()=> import('@/views/Permission/Form.vue'),
                name: 'auth.permissions.edit'
            }
        ],
        beforeEnter: admin,
    },
    
    {
        path: '/products/',
        name: 'auth.products',
        component: ()=> import('@/views/Product/Main.vue'),
        children: [
            {
                path: '',
                component: ()=> import('@/views/Product/List.vue'),
                name: 'auth.products.listing'
            },
            {
                path: 'add',
                component: ()=> import('@/views/Product/Form.vue'),
                name: 'auth.products.add'
            },
            {
                path: 'edit/:id',
                component: ()=> import('@/views/Product/Form.vue'),
                name: 'auth.products.edit'
            }
        ],
        beforeEnter: admin,
    },
    {
        path: '/users/',
        name: 'auth.users',
        component: ()=> import('@/views/User/Main.vue'),
        children: [
            {
                path: '',
                component: ()=> import('@/views/User/List.vue'),
                name: 'auth.users.listing'
            },
            {
                path: 'add',
                component: ()=> import('@/views/User/Add.vue'),
                name: 'auth.users.add'
            },
            {
                path: 'edit/:id',
                component: ()=> import('@/views/User/Edit.vue'),
                name: 'auth.users.edit'
            }
        ],
        beforeEnter: admin,
    },
    {
        path: '/coupons/',
        name: 'auth.coupons',
        component: ()=> import('@/views/Coupon/Main.vue'),
        children: [
            {
                path: '',
                component: ()=> import('@/views/Coupon/List.vue'),
                name: 'auth.coupons.listing'
            },
            {
                path: 'add',
                component: ()=> import('@/views/Coupon/Form.vue'),
                name: 'auth.coupons.add'
            },
            {
                path: 'edit/:id',
                component: ()=> import('@/views/Coupon/Form.vue'),
                name: 'auth.coupons.edit'
            }
        ],
        beforeEnter: admin,
    },
    {
        path: '/categories/',
        name: 'auth.categories',
        component: ()=> import('@/views/Category/Main.vue'),
        children: [
            {
                path: '',
                component: ()=> import('@/views/Category/List.vue'),
                name: 'auth.categories.listing'
            },
            {
                path: 'add',
                component: ()=> import('@/views/Category/Form.vue'),
                name: 'auth.categories.add'
            },
            {
                path: 'edit/:id',
                component: ()=> import('@/views/Category/Form.vue'),
                name: 'auth.categories.edit'
            }
        ],
        beforeEnter: admin,
    },
     {
        path: '/services/',
        name: 'auth.services',
        component: ()=> import('@/views/Service/Main.vue'),
        children: [
            {
                path: '',
                component: ()=> import('@/views/Service/List.vue'),
                name: 'auth.services.listing'
            },
            {
                path: 'add',
                component: ()=> import('@/views/Service/Form.vue'),
                name: 'auth.services.add'
            },
            {
                path: 'edit/:id',
                component: ()=> import('@/views/Service/Form.vue'),
                name: 'auth.services.edit'
            }
        ],
        beforeEnter: admin,
    },
    {
        path: '/product-sale-type/',
        name: 'auth.product_sale_type',
        component: ()=> import('@/views/ProductSaleType/Main.vue'),
        children: [
            {
                path: '',
                component: ()=> import('@/views/ProductSaleType/List.vue'),
                name: 'auth.product_sale_type.listing'
            },
            {
                path: 'add',
                component: ()=> import('@/views/ProductSaleType/Form.vue'),
                name: 'auth.product_sale_type.add'
            },
            {
                path: 'edit/:id',
                component: ()=> import('@/views/ProductSaleType/Form.vue'),
                name: 'auth.product_sale_type.edit'
            }
        ],
        beforeEnter: admin,
    },
     {
        path: '/orders/',
        name: 'auth.orders',
        component: ()=> import('@/views/Order/Main.vue'),
        children: [
            {
                path: '',
                component: ()=> import('@/views/Order/List.vue'),
                name: 'auth.orders.listing'
            },
            {
                path: 'view/:id',
                component: ()=> import('@/views/Order/View.vue'),
                name: 'auth.orders.view'
            },
            {
                path: 'add',
                component: ()=> import('@/views/Order/Form.vue'),
                name: 'auth.orders.add'
            },
            {
                path: 'edit/:id',
                component: ()=> import('@/views/Order/Edit.vue'),
                name: 'auth.orders.edit'
            }
        ],
        beforeEnter: admin,
    },

    
];