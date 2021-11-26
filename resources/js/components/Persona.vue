<template>
    <div>
        <h1 class="text-center">Crud Personas</h1>
        <hr />
        <!-- Trigger the modal with a button -->
        <button
            @click="
                abrirModal();
            "
            type="button"
            class="btn btn-success my-4"
        >
            <i class="fas fa-plus-square"></i> Nuevo
        </button>

        <!-- Modal -->
        <div class="modal" :class="{ mostrar: modal }">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">{{ tituloModal }}</h4>
                        <button
                            @click="cerrarModal()"
                            type="button"
                            class="close"
                            data-dismiss="modal"
                        >
                            &times;
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="my-4">
                            <label for="nombre">Nombre</label>
                            <input
                                v-model="persona.nombre"
                                type="text"
                                class="form-control"
                                id="nombre"
                                placeholder="Nombres"
                            />
                            <span class="text-danger" v-if="errores.nombre">
                                El Nombre es obligatorio
                            </span>
                        </div>
                        <div class="my-4">
                            <label for="apellido">Apellidos</label>
                            <input
                                v-model="persona.apellido"
                                type="text"
                                class="form-control"
                                id="apellido"
                                placeholder="Apellidos"
                            />
                            <span class="text-danger" v-if="errores.apellido">
                                El Apellido es obligatorio
                            </span>
                        </div>
                        <div class="my-4">
                            <label for="cedula">Cedula</label>
                            <input
                                minlength="10"
                                maxlength="10"
                                v-model="persona.cedula"
                                type="number"
                                class="form-control"
                                id="cedula"
                                placeholder="Cedula"
                            />
                            <span class="text-danger" v-if="errores.cedula">
                                La Cedula es obligatoria
                            </span>
                        </div>

                        <div class="my-4">
                            <label for="correo">Correo</label>
                            <input
                                v-model="persona.correo"
                                type="email"
                                class="form-control"
                                id="correo"
                                placeholder="Correo"
                            />
                            <span class="text-danger" v-if="errores.correo">
                                El Correo es obligatorio
                            </span>
                        </div>
                        <!-- TELEFONO -->
                         <telefonospersona
                             :persona_id="this.persona.id" >
                        </telefonospersona>
                        <!-- ------------DIRECCION------->
                        <div class="my-4">
                            <label for="direccion">Direccion</label>
                            <input
                                v-model="persona.direccion"
                                type="text"
                                class="form-control"
                                id="direccion"
                                placeholder="direccion"
                            />
                            <span
                                class="text-danger"
                                v-if="errores.direccion"
                                >{{ errores.direccion[0] }}</span
                            >
                        </div>
                        <!-- ------------SEXO------->
                        <label for="sexo">Sexo</label> <br />
                        <div>
                            <input
                                type="radio"
                                id="one"
                                value="M"
                                v-model="persona.sexo"
                            />
                            <label for="one">Masculino</label>
                            <br />
                            <input
                                type="radio"
                                id="two"
                                value="F"
                                v-model="persona.sexo"
                            />
                            <label for="two">Femenino</label>
                            <span class="text-danger" v-if="errores.sexo">
                                {{ errores.sexo[0] }}
                            </span>
                        </div>
                        <!-- ------------------ -->
                        <div class="my-4">
                            <label for="descripcion">Nota</label>
                            <input
                                v-model="persona.descripcion"
                                type="text"
                                class="form-control"
                                id="descripcion"
                                placeholder="Nota"
                            />
                            <span
                                class="text-danger"
                                v-if="errores.descripcion"
                                >{{ errores.descripcion[0] }}</span
                            >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-success"
                            data-dismiss="modal"
                            @click="guardar()"
                        >
                            Guardar
                        </button>
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                            @click="cerrarModal()"
                        >
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <tablapersona
        :personas="personas"
        >
        </tablapersona>
    </div>
</template>

<script>
import TelefonoPersona from "./TelefonoPersona.vue";
import TablaPersona from "./TablaPersona.vue";
export default {
    data() {
        return {
            persona: {
                nombre: "",
                apellido: "",
                cedula: "",
                correo: "",
                // telefonos: [],
                // telefonoTipo: "",
                direccion: "",
                sexo: "",
                descripcion: "",
            },
            // telefono:{
            //     id:null,
            //     persona_id:"",
            //     telefono:"",
            //     tipo_telefono:"",
            // },
            // id: 0,
            modificar: false,
            modal: 0,
            tituloModal: "",
            telefonos: [],
            personas: [],
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
        // eliminar(id) {
        //     axios.delete("/personas" + id).
        //     then(response=>{
        //          this.listar();
        //     })
        // },
       async guardar() {
            try {
                if (this.modificar) {
                    const res = await axios.put("/personas/" + this.persona.id);
                }
                else {
                    const res = await axios.post("/personas", this.persona);
                }
                this.cerrarModal();
                this.listar();
            }
            //  try {
            //     if (this.modificar) {
            //     axios.put
            //         then(response=>{
            //             // this.persona.id = this.data.id;
            //             ("/personas/" + this.id, this.persona);
            //         });
            //     }
                // else {
                //     axios.post
                //     then(response=>{
                //         ("/personas", this.persona);
                //     })
                //     // const res = await axios.post("/personas", this.persona);
                // }
                // this.cerrarModal();
                // this.listar();

            catch (error) {
                console.log("probandoCatch");
                if (error.response.data) {
                    this.errores = error.response.data.errors;
                }
                console.log(error.response.data);
            }
        },
        abrirModal(data) {
            this.modal = 1;
            if(this.modificar){
                this.tituloModal="Editar Usuario";
                this.persona.nombre=data.nombre;
                this.persona.apellido=data.apellido;
                this.persona.cedula=data.cedula;
                this.persona.correo=data.correo;
                this.persona.direccion=data.direccion;
                this.persona.sexo=data.sexo;
                this.persona.descripcion =data.descripcion;
                }
                else
                {
                this.id=0;
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
    },
    mounted() {
        let vue=this;
        this.listar();
        this.listarTelefonos();
    },
    components:
    {
        TelefonoPersona,
        TablaPersona
    }
};
</script>

<style>

.cursor {
    cursor: pointer;
}
.line-through {
    text-decoration: line-through;
}
input {
    display: block;
}
.mostrar {
    display: list-item;
    opacity: 1;
    background: rgba(6, 7, 10, 0.548);
}
</style>
