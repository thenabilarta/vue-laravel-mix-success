<template>
  <tr v-if="user">
    <th scope="row">1</th>
    <td>Media 1</td>
    <td>Image</td>
    <td>
      <img src="" alt="image" />
    </td>
    <td>00:00</td>
    <td>125Kb</td>
    <td>admin</td>
    <td>{{ user.name }}</td>
    <td v-on:click="console">media_image.jpg</td>
    <td>
      <select name="" id="">
        <option value="">Edit</option>
        <option value="">Delete</option>
      </select>
    </td>
  </tr>
</template>

<script>
export default {
  name: 'TableRow',
  props: ['user'],
  methods: {
    console: function() {
      this.$emit('ketik');
    }
  }
}
</script>