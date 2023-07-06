<template>
  <Multiselect
    v-model="value"
    mode="tags"
    placeholder="Select country"
    trackBy="name"
    label="name"
    :searchable="true"
    :options="selectedOptions"
>
      <template v-slot:tag="{ option }">
        <div class="multiselect-tag is-user">
          {{ option.name }}
        </div>
      </template>
  </Multiselect>
</template>

<script>
  import axios from "axios";
  import Multiselect from '@vueform/multiselect'


  export default {
   
    components: {
      Multiselect,
    },
    data() {
      return {
        value: null,
        selectedOptions: [],
      }
    },
    watch: {
      value(newValue, oldValue) {
        this.$emit('childValue', (newValue));
      }
    },
    methods: {
      getMultipleLabel(value) {
        return value.forEach((item) => this.selectedOptions.push(item.name) )
      },
      async getCountries() {
            try {
                const response = await axios.get(
                    `https://restcountries.com/v2/region/africa`,
                    {
                        headers: {
                            "Content-Type": "application/json",
                            Accept: "application/json",
                        },
                    }
                );
                const formData = await response.data;
                this.getMultipleLabel(formData)
            } catch (error) {
                this.isLoading = false;
            }
        },
    },
    created() {
        this.getCountries();
    },
    
  }
</script>

<style src="@vueform/multiselect/themes/default.css"></style>
