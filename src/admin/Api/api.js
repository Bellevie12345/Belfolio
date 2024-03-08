import axios from "axios";

const api = {

    // Axios for portfolio

    createFolio: async (info) => {

        const add_folio = await axios.post(belfolio_rest_url+'/belfolio', info);
        
        return add_folio.data;
    },

    getFolios: async () => {
        
        const all_folios = await axios.get(belfolio_rest_url+'/belfolio');
        
        return all_folios.data;
    
    },

    deleteFolio: async (portfolio_id, portfolio) => {

        const delete_folio = await axios.delete(belfolio_rest_url+'/belfolio/'+portfolio_id, portfolio);

        return delete_folio.data;

    },

    updateFolio: async (portfolio_id, updatedData) => {

        const update_folio = await axios.put(belfolio_rest_url+'/belfolio/'+portfolio_id, updatedData);

        return update_folio.data;

    },

    getFolioById: async(portfolio_id) => {

        const get_folio = await axios.get(belfolio_rest_url+'/belfolio/'+portfolio_id);

        return get_folio.data;

    },



}

export default api;