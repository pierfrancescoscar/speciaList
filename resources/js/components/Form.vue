<template>
    <div>
        <input v-model="Text" @keyup.enter="$emit('searchText', Text)" type="text" placeholder="Specializzazione">
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
        border-bottom: 1px solid #0071c3;
        padding-left: 10px;
        background-color: transparent;
        height: 40px;
        width: 400px;
        font-size: 25px;
        color: #0071c3;
        &::placeholder {
            color: #68b0e4;
        }
    }
</style>