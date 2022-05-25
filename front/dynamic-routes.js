import axios from "axios";
export const productRoutes = async () => {
    let routes = []
    let productsData = await axios.get('https://api.thefreshify.com/api/front/all-products').then(e=>e.data)
    // console.log(productsData)
    for(let i = 0; i < productsData.length; i++){
        routes.push({
            route: `/product/${productsData[i].slug}`,
            payload: productsData[i],
        })
    }
    let CategoriesData = await axios.get('https://api.thefreshify.com/api/front/all-categories').then(e=>e.data)
    // console.log(productsData)
    for(let i = 0; i < CategoriesData.length; i++){
        routes.push({
            route: `/${CategoriesData[i].slug}`,
            payload: CategoriesData[i],
        })
    }
    // console.log(routes)
    //console.log("route", categs);
    //const routes = products.concat(pages).concat(categs);
    return routes;
};