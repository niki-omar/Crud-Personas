<template>
    <div>
<table class="table table-hover table-sm">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Cedula</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col" colspan="2" class="text-center">Accion</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="per in personas" :key="per.id">
                    <th scope="row">{{ per.id }}</th>
                    <td>{{ per.nombre }}</td>
                    <td>{{ per.apellido }}</td>
                    <td>{{ per.cedula }}</td>
                    <td>{{ per.correo }}</td>
                    <td>{{ per.telefono }}</td>
                    <td>{{ per.direccion }}</td>
                    <td>{{ per.sexo }}</td>
                    <td>{{ per.descripcion }}</td>
                    <td>
                        <button
                            @click="
                                modificar = true;
                                abrirModal(per);
                            "
                            class="btn btn-primary"
                        >
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                    <td>
                        <button
                            @click="eliminar(per.id)"
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
    // name: "Task",
    data() {
        return {
             persona: {
                nombre: "",
                apellido: "",
                cedula: "",
                correo: "",
                // telefono: "",
                // telefonoTipo: "",
                direccion: "",
                sexo: "",
                descripcion: "",
            },
            id: 0,
            modificar: true,
            modal: 0,
            tituloModal: "",
            // personas: [],
            // telefonos: [],
            errores: {},
        };
    },
    methods: {
        listar() {
           axios.get("/personas").
           then( response =>{
                this.personas = response.data;
           });
            // this.telefonos = res.data;
        },
        listarTelefonos() {
            axios.get("/telefonos").
            then( response=> {
                  this.telefonos = response.data;
            })
        },
        eliminar(id) {
            axios.delete("/personas" + id).
            then(response=>{
                 this.listar();
            })
        },
         guardar() {
            try {
                if (this.modificar) {
                axios.put
                    then(response=>{
                        ("/personas/" + this.id, this.persona);
                    });
                }
                else {
                    axios.post
                    then(response=>{
                        ("/personas", this.persona);
                    })
                    // const res = await axios.post("/personas", this.persona);
                }
                this.cerrarModal();
                this.listar();
            }
            catch (error) {
                console.log("probandoCatch");
                if (error.response.data) {
                    this.errores = error.response.data.errors;
                }
                console.log(error.response.data);
            }
        },
        abrirModal(data = {}) {
            this.modal = false;
            if(this.modificar){

                this.id = 0;
                this.tituloModal = "Crear Usuario";
                this.persona.nombre = "";
                this.persona.apellido = "";
                this.persona.cedula = "";
                this.persona.correo = "";
                    // this.telefono.telefono = "";
                    // this.telefono.telefonoTipo = "";
                this.persona.direccion = "";
                this.persona.sexo = "";
                this.persona.descripcion = "";
}
        },
        cerrarModal() {
            this.modal = 0;
        },
        mounted() {
    //    listar();
        // listarTelefonos();
    }
    },
    props: {
        personas:{
            // type:array()
        }
    }
};
</script>
