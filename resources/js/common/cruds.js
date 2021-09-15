import axios from "axios";

export default {
    data() {
        return {
            url: "",
            filterStatusItems: [
                { text: "Active", value: true },
                { text: "Inactive", value: false },
              ],
        };
    },
    methods: {
        async getAll(params = {}) {
            try {
                const self = this;
                let response = await axios.get(self.url, { params });
                if (response.status === 200) 
                self.$store.commit("showSnackbar", {
                    message: response.data.message,
                    color: response.data.success
                });
                return response.data;
            } catch (error) {
                console.log(error.response);
            }
        },

        async show(id) {
            try {
                const self = this;
                let response = await axios.get(`${self.url}/${id}`);
                if (response.status === 200 && response.data.success)
                    return response.data;
            } catch (error) {
                // console.log(error.response);
            }
        },

        async getById(id) {
            try {
                const self = this;
                let response = await axios.get(`${self.url}/${id}/edit`);
                if (response.status === 200 && response.data.success)
                    return response.data;
            } catch (error) {
                console.log(error.response);
            }
        },

        async post1(data = {},callback){
            const self = this;
            await axios.post(`${self.url}`, data).then((response)=>{
                if (response.status === 201 && response.data.success) {
                    self.$store.commit("showSnackbar", {
                        message: response.data.message,
                        color: response.data.success
                    });
                    callback(response.data.data);
                }
            }).catch(error=>{
                console.log(error);
            })
        },
        async post(data = {}, callback) {
            const self = this;
            try {
                let response = await axios.post(`${self.url}`, data);
                console.log(response);
                if (response.status === 201 && response.data.success) {
                    self.$store.commit("showSnackbar", {
                        message: response.data.message,
                        color: response.data.success
                    });
                    callback(response.data.data);
                }
            } catch (error) {
                alert(error);
                self.loading = false;
                let errResponse = error.response;
                if (errResponse && errResponse.status === 422) {
                    self.isSaving = false;
                    console.log(errResponse.data);
                    let data = errResponse.data;
                    let keys = Object.keys(data.errors);

                    keys.forEach((key) => {
                        for(let err of data.errors[key]) {
                             self.$store.commit("showSnackbar", {
                                message: err,
                                color: errResponse.data.success
                            })
                        }
                    })
                }
                else{
                    self.$store.commit("showSnackbar", {
                        message: errResponse.data.message,
                        color: errResponse.data.success
                    });
                }

            }
        },
        async delete(id, callback) {
            const self = this;
            try {
                let response = await axios.delete(`${self.url}/${id}`);
                if (response.status === 200 && response.data.success) {
                    self.$store.commit("showSnackbar", {
                        message: response.data.message,
                        color: response.data.success
                    });
                    callback();
                }
            } catch (err) {
                console.log(err);
            }
        },
        async put(id, data = {}, callback) {
            const self = this;
            try {
                let response = await axios.put(
                    `${self.url}/${id}`,
                    data
                );

                if(response) {
                    if (response.status === 200 && response.data.success) {
                        self.$store.commit("showSnackbar", {
                            message: response.data.message,
                            color: response.data.success
                        });

                        const data = response.data.data;
                        callback(data);
                        self.afterRequestCompleted(data)
                    }
                }

            } catch (err) {
                if(err) {
                    self.loading = false;
                    let errResponse = err.response;
                    if (errResponse && errResponse.status === 422) {
                        self.isSaving = false;
                        let data = errResponse.data;
                        let keys = Object.keys(data.errors);
    
                        keys.forEach((key) => {
                            for(let err of data.errors[key]) {
                                 self.$store.commit("showSnackbar", {
                                    message: err,
                                    color: errResponse.data.success
                                })
                            }
                        })
                    }
                    else {
                        self.$store.commit("showSnackbar", {
                            message: errResponse.data.message,
                            color: errResponse.data.success
                        });
                    }
                }
            }
        },
        async exportPdf() {
            const self = this;
            try {
                this.$store.commit('showLoader');
                let response = await axios.post(self.url);
                if(response.status === 200) {
                    this.$store.commit('hideLoader');
                    window.open(response.data);
                }
            }
            catch (err) {
                console.log(err);
                this.$store.commit('hideLoader');
            }
        },
        afterRequestCompleted(data) {
            console.log('Request Completed...');
        }
    },
    computed: {
        appSetting() {
            return this.$store.getters.appSetting;
        },
        appUser() {
            return this.$store.getters.appUser;
        }
    }
};
