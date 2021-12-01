<template>
<div>
    <!-- MODAL -->
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
                        <div class="my-2    ">
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

                        <!-- <div class="my-4">
                            <label for="telefono">Telefono</label>
                            <input
                                v-model="telefono.id"
                                type="number"
                                class="form-control"
                                id="telefono"
                                placeholder="telefono"
                            />
                            <span class="text-danger" v-if="errores.telefono">
                                El Correo es obligatorio
                            </span>
                        </div> -->
                          <telefonospersona
                             :telefonos="this.persona.telefonos"

                             >
                        </telefonospersona>
                        <!-- /TELEFONO -->
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
    <div class="modal" :class="{ mostrar: modalTelefono }">
            <div class="modal-dialog modal-dialog-scrollable">

                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">{{ tituloModal }} </h4>
                        <!-- <input v-model="persona.nombre"> -->
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
                            <!-- <tr v-for="per in personas" :key="per.id"></tr> -->
                            <!-- <input v-model="personas.nombre"> -->
                            <label for="telefono">¿Deseas agregar un nuevo Numero de telefono?</label>
                            <input
                                v-model="telefono.telefono"
                                type="number"
                                class="form-control my-4"
                                id="telefono"
                                placeholder="telefono"
                            />
                             <p class="" for="tipoTelefono">Tipo de telefono</p>
                            <input
                                type="radio"
                                id="one"
                                value="M"
                                v-model="telefono.tipo_telefono"
                            />
                            <label for="one">Movil</label>
                            <br />
                            <input
                                type="radio"
                                id="two"
                                value="C"
                                v-model="telefono.tipo_telefono"
                            />
                            <label for="two">Convencional</label>

                            <span class="text-danger" v-if="errores.telefono">
                                El telefono es obligatorio
                            </span>
                        </div>

                        <!-- /TELEFONO -->
                    </div>
                    <div class="modal-footer">
                        <button

                            type="button"
                            class="btn btn-success"
                            data-dismiss="modal"
                            @click="guardarTelefono()"
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
        <!-- Recorrido de tabla para el index  -->
        <table class="table table-hover table-sm">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Cedula</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col" colspan="3" class="text-center">Accion</th>
                    </tr>
                </thead>
                    <tbody>
                        <tr v-for="per in personas" :key="per.id">
                                    <th scope="row">{{ per.id }}</th>
                                        <td>{{ per.nombre }}</td>
                                        <td>{{ per.apellido }}</td>
                                        <td>{{ per.cedula }}</td>
                                        <td>{{ per.correo }}</td>
                                        <td>{{ per.direccion }}</td>
                                        <td>{{ per.sexo }}</td>
                                        <td>{{ per.descripcion }}</td>
                                        <td>
                                                <!-- editar -->
                                                <!-- listarTelefonos(per.id) -->
                                            <button
                                                @click="
                                                modificar=true;
                                                abrirModal(per)
                                                "
                                                class="btn btn-primary"
                                            > Editar
                                                    <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <!-- Agregar Telefono -->
                                            <button
                                                    @click="
                                                    modificar=true;

                                                    abrirModalTelefono(per.id,per.nombre,per)
                                                    "
                                                    class="btn btn-primary"
                                                > Agregar
                                                    <i class="fas fa-phone"></i>
                                            </button>
                                        </td>
                                        <td>
                                                <!-- borrar -->
                                                <button
                                                    @click="eliminar(per.id)"
                                                    class="btn btn-danger"
                                                > Eliminar
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                        </td>
                        </tr>
                    </tbody>
        </table>
</div>
</template>
<script>
import TelefonoPersona from "./TelefonoPersona.vue";
export default {
    // name: "Task",
    data() {
        return {
             persona: {
                // id: null,
                nombre: "",
                apellido: "",
                cedula: "",
                correo: "",
                direccion: "",
                sexo: "",
                descripcion: "",
                telefonos: [],
            },
            telefono:{
                persona_id:"",
                telefono:"",
                tipo_telefono:"",
            },
            // id: 0,
            modificar: true,
            modal: 0,
            modalTelefono:0,
            tituloModal: "",
            errores: {},
        };
    },
    methods: {
        listar() {
           axios.get("/personas").
           then( response =>{
                this.personas = response.data;
           });
        },
        eliminar(id) {
            // axios.delete("/telefonos/" + id).
            // then(response=>{

            // }),
            axios.delete("/personas/" + id).
            then(response=>{
                 this.listar();
            })

        },
       async guardar() {
            try {
                if (this.modificar) {
                    const res = await axios.put("/personas/" + this.persona.id,this.persona);
                    // const res2 = await axios.put("/telefonos/" + this.persona_id,this.telefono);
                }
                else {
                    // const res = await axios.post("/personas", this.persona);
                    //  const res2 = await axios.put("/telefonos/",this.telefono);
                }
                this.cerrarModal();
                this.listar();
            }
            catch (error) {
                console.log("Consola.log Catch");
                if (error.response.data) {
                    this.errores = error.response.data.errors;
                }
                console.log(error.response.data);
            }
        },
         guardarTelefono() {
             if (this.modificar) {
                // console.log("Entrando al metodo GuardarTelefono con su respectivo ID por persona: ");
                // console.log(this.telefono.persona_id);
                axios.post("/telefonos",this.telefono)
                .then(function ({data}) {
                    console.log(data);
                }).catch((err) => {
                    console.log(err);
                });
                this.listar();
                this.cerrarModal();
            }
            //         //  axios.post
            // //         then(response=>{
            // //             ("/personas", this.persona);
            // //         })
            //         //  const res = await axios.post("/telefonos/" + this.id,this.telefonos);
            //         // const res = await axios.put("/telefonos/" + this.telefono.id,this.telefono);
            //         // const res2 = await axios.put("/telefonos/" + this.persona_id,this.telefono);
            //     }
            //     else {
            //         // const res = await axios.post("/telefonos", this.telefono);
            //         //  const res2 = await axios.put("/telefonos/",this.telefono);
            //     }
            //     this.cerrarModal();
            //     this.listar();

        },
        listarTelefonos(persona_id) {
            // console.log(persona_id);
            // console.log(`Entré a la funcion ${persona_id}`)

            axios.get("/telefonos/"+persona_id).
            then( response=> {
                    this.persona.telefonos = response.data ;
            }).catch(error => {
                console.log(error)
            });

        },
        abrirModalTelefono(persona_id,nombre) {
                console.log(persona_id);
                console.log(nombre);
                //  this.guardarTelefono(persona_id);
                this.telefono.persona_id=persona_id;
                // console.log( this.persona.nombre=data.nombre);
                this.modalTelefono = 1;
                if(this.modificar){
                this.tituloModal="Bienvenido de vuelta " + nombre;
                // this.persona.nombre=data. nombre;
                this.telefono.telefono = "";
                this.telefono.tipo_telefono = "";
                }
                // this.guardarTelefono(persona_id);
                // else
                // {
                // this.id=0;
                // this.tituloModal = "Crear Usuario";
                // this.persona.nombre = "";
                // this.persona.apellido = "";
                // this.persona.cedula = "";
                // this.persona.correo = "";
                //     // this.telefono.telefono = "";
                //     // this.telefono.telefonoTipo = "";
                // this.persona.direccion = "";
                // this.persona.sexo = "";
                // this.persona.descripcion = "";
            // }
                // this.telefono = "1234";


        },
        abrirModal(data) {
            console.log(data);
            this.modal = 1;
            if(this.modificar){
                this.tituloModal="Editar Usuario";
                this.persona.id=data.id;
                this.persona.nombre=data.nombre;
                this.persona.apellido=data.apellido;
                this.persona.cedula=data.cedula;
                this.persona.correo=data.correo;
                // this.telefono.persona_id=data.persona.id;
                this.persona.direccion=data.direccion;
                this.persona.sexo=data.sexo;
                this.persona.descripcion =data.descripcion;
                this.listarTelefonos(data.id);
                }
            //     else
            //     {
            //     this.id=0;
            //     this.tituloModal = "Crear Usuario";
            //     this.persona.nombre = "";
            //     this.persona.apellido = "";
            //     this.persona.cedula = "";
            //     this.persona.correo = "";
            //         // this.telefono.telefono = "";
            //         // this.telefono.telefonoTipo = "";
            //     this.persona.direccion = "";
            //     this.persona.sexo = "";
            //     this.persona.descripcion = "";
            // }
        },
        cerrarModal() {
            this.modal = 0;
            this.modalTelefono = 0;
        },
        mounted()
        {
             let vue=this;
            // this.listar();
            // this.listarTelefonos();
        }

    },
    components:
    {
        TelefonoPersona
    },
    // FUNCIONA PERO ESTA PARTE SE REFERENCIA DOS VECES DEBIDO A QUE TELEFONOS ESTA AGREGADO...
    props: {
        // telefonos:{

        // },
        personas:{

        },
    }
};
</script>
<style>
/* p.tipoTelf{
    text-align: center;
} */
</style>
