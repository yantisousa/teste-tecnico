<template>
    <v-row>
        <v-col class="mx-auto mt-12" md="5" cols="10" v-for="marca in marcas" :key="marca.id">
            <v-card class="card" :title="marca.nome" variant="tonal">
                <div>
                   
                </div>
                <v-card-actions>
                    <v-btn>QUANTIDADE DE PRODUTOS: {{ marca.eletrodomesticos_relacionamento_count }}</v-btn>
                </v-card-actions>
            </v-card>
        </v-col>
    </v-row>
   
</template>
<script>
import { defineComponent } from 'vue';
import api from '@/api/axios'
export default defineComponent({
    name: 'MarcasIndex',
    components: {
    },
    data() {
        return {
            marcas: [],
        }
    },
    mounted() {
        this.ExibirMarcas()
    },
    methods: {
        async ExibirMarcas()
        {
            await api.get('/marcas/index')
            .then((response) => {
                this.marcas = response.data
            }).catch(() => {

            })
        }
    },
})
</script>
<style>
    .card {
        height: 100px;
    }
</style>