<template>
    <form @submit.prevent="update()">
        <v-row class="align-center justify-center mt-12">
            <v-col cols="4">
                <v-text-field variant="underlined" label="Nome:" v-model="nome">

                </v-text-field>
            </v-col>
        </v-row>
        <v-row class="align-center justify-center mt-12">
            <v-col cols="4">
                <div id="app" class="mt-3">
                    <ckeditor :editor="editor" v-model="editorData" :config="editorConfig">
                    </ckeditor>
                </div>
            </v-col>
        </v-row>
        <v-row class="align-center justify-center mt-12">
            <v-col cols="4">
                <v-text-field variant="underlined" label="Tensão:" v-model="tensao">

                </v-text-field>
            </v-col>
        </v-row>
        <v-row class="align-center justify-center mt-12">
            <v-col cols="4">
                <v-select label="Marcas:" v-model="marca" :items="marcas" item-title="nome" variant="underlined"
                    item-value="id"></v-select>
            </v-col>
        </v-row>
        <v-row class="align-center justify-center mt-12">
            <v-col cols="4">
                <v-btn type="submit" class="botao-sucess" color="success">SALVAR</v-btn>
            </v-col>
        </v-row>
    </form>
</template>
  
<script>
import { defineComponent } from 'vue';
import api from '@/api/axios';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export default defineComponent({
    name: 'EditView',
    components: {
    },
    data() {
        return {
            dadosDoEletrodomestico: [],
            editor: ClassicEditor,
            editorConfig: {
                // The configuration of the editor.
            },
            editorData: '',
            nome: '',
            tensao: '',
            marca: '',
            marcas: []
        }
    },
    mounted() {
        this.ExibirEletrodomesticosParaEditar(),
            this.ExibirMarcas()
    },
    methods: {
        async ExibirEletrodomesticosParaEditar() {
            await api.get(`/eletrodomestico/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.nome = response.data.nome,
                        this.editorData = response.data.descricao
                    this.tensao = response.data.tensao
                    this.marca = response.data.marca_id
                }).catch(() => {

                })
        },
        async ExibirMarcas() {
            await api.get('/marcas/index')
                .then((response) => {
                    this.marcas = response.data
                }).catch(() => {

                })
        },
        update() {
            api.put(`/eletrodomestico/update/${this.$route.params.id}`,
                {
                    nome: this.nome,
                    descricao: this.editorData,
                    marca_id: this.marca,
                    tensao: this.tensao
                }
                ).then(() => {
                this.$router.push('/')
            }).catch(() => {
                
            })
        }
    }
});
</script>
<style>
.botao-sucess {
    width: 100%;
}
</style>
  