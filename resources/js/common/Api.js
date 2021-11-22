import axios from "axios";

let BaseApi = axios.create({
<<<<<<< HEAD
    // baseURL: "http://spellsms.test/api/"
    baseURL:"http://127.0.0.1:8000/api/"
=======
    baseURL: "http://127.0.0.1:8000/api/"
>>>>>>> c5ece0d3ec7b75e560cf81939778f117b3c2c342
});
let Api = function () {
    let token = localStorage.getItem("token");

    if (token) {
        BaseApi.defaults.headers.common["Authorization"] = `Bearer ${token}`;
    }

    return BaseApi;
};

export default Api;
