<script>
import {useForm} from "@inertiajs/inertia-vue3";

export default {
    name: "SubscribeWrapper",
    data() {
        return {
            form: useForm({
                email: null,
                first_name: null,
                last_name: null,
            })
        };
    },
    methods: {
        subscribe() {
            this.form.post(route('subscribe'), {
                preserveScroll: true,
                onSuccess: data => this.form.reset(),
            })
        },
    },
    render() {
        return this.$slots.default({
            form: this.form,
            subscribe: this.subscribe,
            bind: {
                email: { value: this.form.email },
                firstName: { value: this.form.first_name },
                lastName: { value: this.form.last_name },
            },
            on: {
                email: { input: e => this.form.email = e.target.value },
                firstName: { input: e => this.form.first_name = e.target.value },
                lastName: { input: e => this.form.last_name = e.target.value },
            },
        })
    }
}
</script>
