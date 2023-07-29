<template>
    <Navigation @NovosEletrodosmesticos="NovosEletrodomesticos" />
    <v-row>
        <v-col class="mx-auto mt-12" md="5" cols="10" v-for="eletrodomestico in eletrodomesticos" :key="eletrodomestico.id">
            <v-card :title="eletrodomestico.nome" variant="tonal">
                <div>
                    <v-card-text style="font-size: 16px;" ><b>Marca: </b>{{ eletrodomestico.marcas_relacionamento.nome }}</v-card-text>
                    <v-card-text style="font-size: 14px;" ><b>Tensão: </b>{{ eletrodomestico.tensao }}</v-card-text>
                    <v-card-text v-html="eletrodomestico.descricao"></v-card-text>
                </div>
                <v-card-actions>
                    <router-link class="link" :to="`/eletrodomesticos/edit/${eletrodomestico.id}`">
                        <v-btn>Editar</v-btn>
                    </router-link>
                    <v-btn @click="excluir(eletrodomestico.id)">Excluir</v-btn>
                </v-card-actions>
            </v-card>
        </v-col>
    </v-row>
    <v-row v-if="exibirMensagem" id="mensagem">
        <v-col cols="12">
            <v-alert :type="propriedadesParaMensagem.type" :title="propriedadesParaMensagem.title">
            </v-alert>
        </v-col>
    </v-row>
</template>
<script>
import { defineComponent } from 'vue';
import Navigation from '@/components/Eletrodomesticos/Navigation.vue'
import api from '@/api/axios'
export default defineComponent({
    name: 'EletrodomesticoIndex',
    components: {
        Navigation
    },
    data() {
        return {
            eletrodomesticos: [],
            exibirMensagem: false,
            exibirMensagemErro: false,
            propriedadesParaMensagem: {
                type: '',
                title: ''
            }
        }
    },
    mounted() {
        this.ExibirEletrodomesticos()
    },
    methods: {
        ExibirEletrodomesticos() {
            api.get('/eletrodomestico/index')
                .then((response) => {
                    this.eletrodomesticos = response.data
                })
                .catch(() => {

                })
        },
        NovosEletrodomesticos(response) {
            if (response.length > this.eletrodomesticos.length) {
                this.eletrodomesticos = response
                this.Mensagem("Eletrodoméstico criado com sucesso!", 'success')
            }
            else {
                this.Mensagem("A tensão precisa ser do formato descrito!", 'error')
            }
        },
        Mensagem(title, type) {
            //title: uma string qualquer para demonstrar uma mensagem,
            //type: o tipo do componente v-alert do vuetify https://vuetifyjs.com/en/components/alerts/

            this.exibirMensagem = true
            this.propriedadesParaMensagem.type = type
            this.propriedadesParaMensagem.title = title
            setTimeout(() => {
                this.exibirMensagem = false
            }, 2000);
        },
        excluir(id) {
            api.delete(`/eletrodomestico/destroy/${id}`)
                .then((response) => {
                    this.eletrodomesticos = response.data
                    this.Mensagem("Eletrodoméstico excluído", "info")
                }).catch(() => {

                    this.Mensagem("Erro ao excluir eletrodoméstico", "error")
                })
        }
    },
})
</script>
<style>
#mensagem {
    position: fixed;
    right: 3px;
    bottom: 0;
}
.link {
    text-decoration: none;
}
</style>