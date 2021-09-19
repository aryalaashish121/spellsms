import axios from "axios";

let BaseApi = axios.create({
  baseURL: "http://spellsms.test/"
});

let Api = function() {
  let token = localStorage.getItem("token");

  if (token) {
    BaseApi.defaults.headers.common["Authorization"] = `Bearer ${token}`;
  }

  return BaseApi;
};

export default Api;