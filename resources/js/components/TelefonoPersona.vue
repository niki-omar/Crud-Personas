<template>
    <div>
<table class="table table-hover table-sm">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Tipo de Telefono</th>
                    <th scope="col" colspan="2" class="text-center">Accion</th>
                </tr>
            </thead>
            <!-- CUANDO ENTRE EL METODO EDITAR POR PERSONA DEBE DE MOSTRAR LA INFORMACION DEL
            TELEFONO... -->
            <tbody>

                <tr v-for="telf in telefonos" :key="telf.id">
                    <th scope="row">{{ telf.id }}</th>
                     <!-- <th scope="row">{{ telf.id }}</th> -->
                    <td>{{ telf.telefono }}</td>
                    <td>{{ telf.tipo_telefono }}</td>
                    <td>
                        <button
                            @click="
                                modificar=true;
                                listarTelefonos(telf.id)
                            "
                            class="btn btn-primary"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                    <td>
                        <button
                            @click="eliminar(telf.id)"
                            class="btn btn-danger"
                        >
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

</div>
</template>
<script>
export default {
    data() {
        return {
            //  persona: {
            //     nombre: "",
            //     apellido: "",
            //     cedula: "",
            //     correo: "",
            //     // telefonos: [],
            //     // telefonoTipo: "",
            //     direccion: "",
            //     sexo: "",
            //     descripcion: "",
            // },
            telefono:{
                id:null,
                persona_id:"",
                telefono:"",
                tipo_telefono:"",
            },
            persona: [],
            // telefonos: [],
        };
    },
    methods: {
        // FALTA QUE BORRE 
         listar() {
           axios.get("/personas").
           then( response =>{
                this.personas = response.data;
           });
        },
         eliminar(id) {
            axios.delete("/personas/" + id).
            then(response=>{
                 this.listar();

            })

        },
    },
    mounted() {
        let vue=this;
        // this.listar();
        // this.mostrarTelefono();
    },
    props: {
        telefonos: {
            type:Array,
        },

    }
};
</script>
