import axios from "axios";


const api = axios.create({
    baseURL: 'https://teste-tecnico.portfolioyansousa.com/back-end/public/api',
    timeout: 3000
})

export default api;