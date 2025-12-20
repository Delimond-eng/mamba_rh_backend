import { get, post, postJson } from "../modules/http.js";
new Vue({
    el: "#App",
    data() {
        return {
            error: null,
            result: null,
            isLoading: false,
            search: "",
            form: {
                email: "",
                password: "",
            },
        };
    },

    mounted() {
        // Une fois que Vue.js est chargé, on cache le loader
        if ($("#loader").length) {
            document.getElementById("global-loader").style.display = "none";
        }
    },

    methods: {
        login(event) {
            const formData = new FormData(event.target);
            const url = event.target.getAttribute("action");
            this.isLoading = true;

            post(url, formData)
                .then(({ data, status }) => {
                    console.log(data, status);
                    this.isLoading = false;
                    // Gestion des erreurs
                    if (data.errors !== undefined) {
                        this.error = data.errors;
                        console.log(data.errors);
                    }
                    if (data.result) {
                        console.log(data.result);
                        this.error = null;
                        this.result = data.result;
                        console.log(data.result);
                        // Rediriger l'utilisateur
                        window.location.href = data.result.redirect;
                    }
                })
                .catch((err) => {
                    this.isLoading = false;
                    console.log(err);
                });
        },

        reset() {
            this.form = {
                email: "",
                password: "",
            };
        },
    },
});
