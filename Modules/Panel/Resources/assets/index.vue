<template>
  <div>
    <div class="header">
      <button @click="fetchdata">Add Media</button>
    </div>
    <div class="body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Thumbnail</th>
            <th scope="col">Duration</th>
            <th scope="col">Size</th>
            <th scope="col">Owner</th>
            <th scope="col">Permission</th>
            <th scope="col">File Name</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <TableRow v-for="user in users" v-bind:key="user.id" v-bind:user="user" v-on:ketik="onConsole"></TableRow>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import TableRow from './components/TableRow';

export default {
  components: {
    TableRow: TableRow
  },
  methods: {
    fetchdata() {
      axios.get('https://jsonplaceholder.typicode.com/users').then(res => this.users = res.data);
    },
    onConsole() {
      console.log("Mantap gan");
    }
  },
  data() {
    return {
      users: {}
    }
  }
};
</script>