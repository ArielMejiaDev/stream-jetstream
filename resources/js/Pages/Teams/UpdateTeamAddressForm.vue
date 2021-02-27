<template>
    <jet-form-section @submitted="updateTeamAddress">
        <template #title>
            Team Address
        </template>

        <template #description>
            The team's address information.
        </template>

        <template #form>

            <!-- Team Address -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="address" value="Team Address" />

                <jet-input id="address" type="text" class="mt-1 block w-full" v-model="form.address" :disabled="! permissions.canUpdateTeam" />

                <jet-input-error :message="form.errors.address" class="mt-2" />
            </div>
        </template>

        <template #actions v-if="permissions.canUpdateTeam">
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetButton from '@/Jetstream/Button'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'

    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
        },

        props: ['team', 'permissions'],

        data() {
            return {
                form: this.$inertia.form({
                    address: this.team.address,
                })
            }
        },

        methods: {
            updateTeamAddress() {
                this.form.put(route('team.address.update', this.team), {
                    errorBag: 'updateTeamAddress',
                    preserveScroll: true
                });
            },
        },
    }
</script>
