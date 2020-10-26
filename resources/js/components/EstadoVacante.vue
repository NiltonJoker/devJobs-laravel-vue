<template>
    <span
        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
        :class="claseEstadoVacante()"
        @click="cambiarEstado"
        :key="estadoVacanteData"
    >
        {{ estadoVacante }}
    </span>
</template>

<script>
export default {
    props: ["estado", "vacanteId"],
    mounted() {
        this.estadoVacanteData = Number(this.estado);
    },
    data() {
        return {
            estadoVacanteData: null
        };
    },
    methods: {
        cambiarEstado() {
            this.estadoVacanteData = this.estadoVacanteData === 1 ? 0 : 1;
            const params = {
                estado: this.estadoVacanteData
            };
            axios
                .post(`/vacantes/${this.vacanteId}`, params)
                .then(respuesta => console.log(respuesta))
                .catch(error => console.log(error));
        },
        claseEstadoVacante() {
            return this.estadoVacanteData === 1
                ? "bg-green-200 text-green-800"
                : "bg-red-200 text-red-800";
        }
    },
    computed: {
        estadoVacante() {
            return this.estadoVacanteData === 1 ? "Activa" : "Inactiva";
        }
    }
};
</script>
