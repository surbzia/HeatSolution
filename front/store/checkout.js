export const state = () => ({
    same_as_billing: true,
    errors: {
        //shipping
        shipping_email: [],
        shipping_notes: [],
        shipping_first_name: [],
        shipping_last_name: [],
        shipping_address: [],
        shipping_address_2: [],
        shipping_city: [],
        shipping_zip: [],
        shipping_phone: [],
        shipping_company: [],
        shipping_country: [],
        shipping_state: [],
        //billing
        billing_first_name: [],
        billing_last_name: [],
        billing_address: [],
        billing_address_2: [],
        billing_city: [],
        billing_zip: [],
        billing_phone: [],
        billing_email: [],
    },
    form: {
        shipping:{
            shipping_email: '',
            shipping_notes: '',
            shipping_first_name: '',
            shipping_last_name: '',
            shipping_address: '',
            shipping_address_2: '',
            shipping_city: '',
            shipping_zip: '',
            shipping_phone: '',
            shipping_company: '',
            shipping_country: '',
            shipping_state: '',
        },
        billing:{
            billing_first_name: '',
            billing_last_name: '',
            billing_address: '',
            billing_address_2: '',
            billing_city: '',
            billing_zip: '',
            billing_phone: '',
            billing_email: '',
        }
    },
})

export const mutations = {
    tglloader(state){
        state.formloading = !state.formloading
    },
    setErrors(state, res){
        if(res.data.shipping_email){
            state.errors.shipping_email = res.data.shipping_email
        }
        if(res.data.shipping_notes){
            state.errors.shipping_notes = res.data.shipping_notes
        }
        if(res.data.shipping_first_name){
            state.errors.shipping_first_name = res.data.shipping_first_name
        }
        if(res.data.shipping_last_name){
            state.errors.shipping_last_name = res.data.shipping_last_name
        }
        if(res.data.shipping_address){
            state.errors.shipping_address = res.data.shipping_address
        }
        if(res.data.shipping_address_2){
            state.errors.shipping_address_2 = res.data.shipping_address_2
        }
        if(res.data.shipping_city){
            state.errors.shipping_city = res.data.shipping_city
        }
        if(res.data.shipping_zip){
            state.errors.shipping_zip = res.data.shipping_zip
        }
        if(res.data.shipping_phone){
            state.errors.shipping_phone = res.data.shipping_phone
        }
        if(res.data.shipping_company){
            state.errors.shipping_company = res.data.shipping_company
        }
        if(res.data.shipping_country){
            state.errors.shipping_country = res.data.shipping_country
        }
        if(res.data.shipping_state){
            state.errors.shipping_state = res.data.shipping_state
        }
        if(res.data.billing_first_name){
            state.errors.billing_first_name = res.data.billing_first_name
        }
        if(res.data.billing_last_name){
            state.errors.billing_last_name = res.data.billing_last_name
        }
        if(res.data.billing_address){
            state.errors.billing_address = res.data.billing_address
        }
        if(res.data.billing_address_2){
            state.errors.billing_address_2 = res.data.billing_address_2
        }
        if(res.data.billing_city){
            state.errors.billing_city = res.data.billing_city
        }
        if(res.data.billing_zip){
            state.errors.billing_zip = res.data.billing_zip
        }
        if(res.data.billing_phone){
            state.errors.billing_phone = res.data.billing_phone
        }
        if(res.data.billing_email){
            state.errors.billing_email = res.data.billing_email
        }
    },
    resetErrors(state){
        state.errors= {
            shipping_email: [],
            shipping_notes: [],
            shipping_first_name: [],
            shipping_last_name: [],
            shipping_address: [],
            shipping_address_2: [],
            shipping_city: [],
            shipping_zip: [],
            shipping_phone: [],
            shipping_company: [],
            shipping_country: [],
            shipping_state: [],
            billing_first_name: [],
            billing_last_name: [],
            billing_address: [],
            billing_address_2: [],
            billing_city: [],
            billing_zip: [],
            billing_phone: [],
            billing_email: [],
        }
    },
    resetForm(state){
        state.form = {
            shipping:{
                shipping_email: '',
                shipping_notes: '',
                shipping_first_name: '',
                shipping_last_name: '',
                shipping_address: '',
                shipping_address_2: '',
                shipping_city: '',
                shipping_zip: '',
                shipping_phone: '',
                shipping_company: '',
                shipping_country: '',
                shipping_state: '',
            },
            billing:{
                billing_first_name: '',
                billing_last_name: '',
                billing_address: '',
                billing_address_2: '',
                billing_city: '',
                billing_zip: '',
                billing_phone: '',
                billing_email: '',
            }
        }
        state.same_as_billing = true
    },
    set_shipping_email(state, shipping_email){
        state.form.shipping.shipping_email = shipping_email.target.value
    },
    set_shipping_notes(state, shipping_notes){
        state.form.shipping.shipping_notes = shipping_notes.target.value
    },
    set_shipping_first_name(state, shipping_first_name){
        state.form.shipping.shipping_first_name = shipping_first_name.target.value
    },
    set_shipping_last_name(state, shipping_last_name){
        state.form.shipping.shipping_last_name = shipping_last_name.target.value
    },
    set_shipping_address(state, shipping_address){
        state.form.shipping.shipping_address = shipping_address.target.value
    },
    set_shipping_address_2(state, shipping_address_2){
        state.form.shipping.shipping_address_2 = shipping_address_2.target.value
    },
    set_shipping_city(state, shipping_city){
        state.form.shipping.shipping_city = shipping_city.target.value
    },
    set_shipping_zip(state, shipping_zip){
        state.form.shipping.shipping_zip = shipping_zip.target.value
    },
    set_shipping_phone(state, shipping_phone){
        state.form.shipping.shipping_phone = shipping_phone.target.value
    },
    set_shipping_company(state, shipping_company){
        state.form.shipping.shipping_company = shipping_company.target.value
    },
    set_shipping_country(state, shipping_country){
        state.form.shipping.shipping_country = shipping_country.target.value
    },
    set_shipping_state(state, shipping_state){
        state.form.shipping.shipping_state = shipping_state.target.value
    },
    set_billing_first_name(state, billing_first_name){
        state.form.billing.billing_first_name = billing_first_name.target.value
    },
    set_billing_last_name(state, billing_last_name){
        state.form.billing.billing_last_name = billing_last_name.target.value
    },
    set_billing_address(state, billing_address){
        state.form.billing.billing_address = billing_address.target.value
    },
    set_billing_address_2(state, billing_address_2){
        state.form.billing.billing_address_2 = billing_address_2.target.value
    },
    set_billing_city(state, billing_city){
        state.form.billing.billing_city = billing_city.target.value
    },
    set_billing_zip(state, billing_zip){
        state.form.billing.billing_zip = billing_zip.target.value
    },
    set_billing_phone(state, billing_phone){
        state.form.billing.billing_phone = billing_phone.target.value
    },
    set_billing_email(state, billing_email){
        state.form.billing.billing_email = billing_email.target.value
    },
    set_same_as_billing(state, same_as_billing){
        state.same_as_billing = same_as_billing
    },
}
export const actions = {
    async save({ commit, state }, {items,subtotal,total}) {
        commit('tglloader')//setting loader to true
        commit('resetErrors')
        let formData = {}
        Object.assign(formData, state.form.shipping)
        Object.assign(formData, state.form.billing)
        formData.same_as_billing = state.same_as_billing
        formData.items = items
        formData.subtotal = subtotal
        formData.total = total
        let res = await this.$axios.post('orders',formData).then(function(e){
            return {status: 1, data: e.data.data}
        }).catch(function(e){
            return {status: 0, data: e.response.data.errors};
        })
        if(!res.status){
            commit('setErrors',res)
        }else{
            commit('resetForm')
            commit('cart/forgetcart', null, { root: true })
            this.$router.push('/order/thankyou/'+res.data.id)
        }
        commit('tglloader')//setting loader to true
    }
}