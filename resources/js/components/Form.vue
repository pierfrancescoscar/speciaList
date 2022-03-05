<template>
    <div>
        <input v-model="Text" @keyup.enter="$emit('searchText', Text)" type="text" placeholder="Search">
    </div>
</template>

<script>
export default {
    name: 'Form',
    data() {
        return {
            Text: '',
        }
    }
}
</script>

<style scoped lang="scss">
    input {
        border: none;
        padding-left: 10px;
        background-color: rgb(34, 34, 34);
        height: 40px;
        width: 400px;
        border-radius: 10px;
        font-size: 25px;
        color: rgb(255, 255, 255);
        &::placeholder {
            color: rgb(175, 175, 175);
        }
    }
</style>