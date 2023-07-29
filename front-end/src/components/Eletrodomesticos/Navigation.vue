<template>
    <v-navigation-drawer>
        <v-card class="mx-auto" max-width="300">
            <v-list>

                <v-list-item>
                    <div class="text-center">
                        <v-dialog v-model="dialog" width="auto">
                            <template v-slot:activator="{ props }">
                                <v-btn color="primary" v-bind="props">
                                    Cadastrar
                                </v-btn>
                            </template>

                            <v-card>
                                <v-card-text>
                                    <form @submit.prevent="salvar()">
                                        <v-row>
                                            <v-col class="input">
                                                <v-text-field v-model="nome" label="Nome:" variant="outlined">

                                                </v-text-field>
                                            </v-col>
                                        </v-row>
                                        <v-row>
                                            <v-col class="input">
                                                <label for="Descrição:">Descrição:</label>
                                                <div id="app" class="mt-3">
                                                    <ckeditor :editor="editor" v-model="editorData" :config="editorConfig">
                                                    </ckeditor>
                                                </div>
                                            </v-col>
                                        </v-row>
                                        <v-row>
                                            <v-col class="input">
                                                <v-text-field v-model="tensao" label="Tensão:" variant="outlined"
                                                    placeholder="Exemplo: 220v">

                                                </v-text-field>
                                            </v-col>
                                        </v-row>
                                        <v-row>
                                            <v-col class="input">
                                                <v-select label="Marcas:" v-model="selectMarca" :items="marcas"
                                                    item-title="nome" variant="underlined" item-value="id"></v-select>
                                            </v-col>
                                        </v-row>
                                        <v-row>
                                            <v-col class="input">
                                                <v-btn type="submit" color="primary" block
                                                    @click="dialog = false">PUBLICAR</v-btn>
                                            </v-col>
                                        </v-row>
                                    </form>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="primary" block @click="dialog = false">Fechar</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </div>
                </v-list-item>
            </v-list>
        </v-card>
    </v-navigation-drawer>
</template>
    
<script>
import { defineComponent } from 'vue';
import api from '@/api/axios';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
export default defineComponent({
    name: 'NavigationDrawer',
    data() {
        return {
            items: [
                {
                    title: 'Cadastrar',
                    value: 1,
                },
            ],
            nome: "",
            tensao: "",
            editor: ClassicEditor,
            editorData: '',
            editorConfig: {
                // The configuration of the editor.
            },
            dialog: false,
            marcas: [],
            selectMarca: null
        }
    },
    mounted() {
        this.ExibirMarcas()
    },
    methods: {
        salvar() {
            api.post('/eletrodomestico/store', {
                nome: this.nome,
                descricao: this.editorData,
                tensao: this.tensao,
                marca_id: this.selectMarca
            }).then((response) => {
                this.$emit('NovosEletrodosmesticos', response.data)
                this.nome = ""
                this.editorData = ""
                this.selectMarca = ""
            }).catch(() => {
                this.$emit('NovosEletrodosmesticos', [])

            })
        },
        async ExibirMarcas() {
            await api.get('/marcas/index')
                .then((response) => {
                    this.marcas = response.data
                }).catch(() => {

                })
        }
    }

});
</script>
<style>
.input {
    width: 500px;
}
</style>
    