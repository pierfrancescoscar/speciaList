<template>
    <div>
        <input value="ciao" v-model="Text" @keyup.enter="$emit('searchText', Text)" type="text" placeholder="Specializzazione">
    </div>
</template>

<script>
export default {
    name: 'Form',
    data() {
        return {
            Text: '',
            test: this.testo,
        }
    },

    created () {
        console.log('Ciao');
        if (this.test != '') {
            this.Text = this.test;
            console.log(this.Text);
            this.$emit('searchText', this.Text);
        }
    },

    props: {
        testo: String,
    },
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