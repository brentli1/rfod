<template>
  <section>
      <p class="lead">This is the category app.</p>

      <ul v-if="categories.length" class="list-group">
        <li v-for="category in categories" :key="category.id" class="list-group-item list-group-item-action">
          {{ category.name }}
        </li>
      </ul>
  </section>
</template>

<script>
  import axios from 'axios';

  export default {
    data () {
      return {
        categories: []
      }
    },

    created() {
      axios.get('/api/categories')
      .then(({ data }) => {
        this.categories = data.data
      })
      .catch(e => {
        this.errors.push(e)
      })
    }
  }
</script>
