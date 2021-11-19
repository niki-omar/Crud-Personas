<template>
    <div>
        <h1 class="text-center">Crud Personas</h1>
        <hr />

        <!-- Trigger the modal with a button -->
        <button
            @click="modificar = false;abrirModal();"
            type="button"
            class="btn btn-success my-4"
        >
            <i class="fas fa-plus-square"></i> Nuevo
        </button>

        <!-- Modal -->
        <div class="modal" :class="{ mostrar: modal }">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <!-- Modal content-->
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
                                {{ errores.nombre[0] }}
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
                                {{ errores.apellido[0] }}
                            </span>
                        </div>
                        <div class="my-4">
                            <label for="cedula">Cedula</label>
                            <input
                                v-model="persona.cedula"
                                type="number"
                                class="form-control"
                                id="cedula"
                                placeholder="Cedula"
                            />
                            <span class="text-danger" v-if="errores.cedula">
                                {{ errores.cedula[0] }}
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
                            <span class="text-danger" v-if="errores.correo">{{
                                errores.correo[0]
                            }}</span>
                        </div>
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
                        <div class="my-4">
                            <label for="sexo">Sexo</label>
                            <input
                                v-model="persona.sexo"
                                type="text"
                                class="form-control"
                                id="sexo"
                                placeholder="sexo"
                            />
                            <span class="text-danger" v-if="errores.sexo">
                                {{ errores.sexo[0] }}
                            </span>
                        </div>
                        <!-- ----------------- -->
                        <!-- <label for="sexo">Sexo</label>
                        <div class="form-check" v-if="1">
                            <input
                                v-model="persona.sexo"
                                class="form-check-input"
                                type="radio"
                                name="sexo"
                                id="sexo"
                            />
                             <span class="text-danger" v-if="errores.sexo">
                                {{ errores.sexo[0] }}
                            </span>
                            <label
                                class="form-check-label"
                                for="Masculino"
                                >Masculino
                            </label>
                        </div>
                        <div class="form-check" v-else>
                            <input
                                v-model="persona.sexo"
                                class="form-check-input"
                                type="radio"
                                name="femenino"
                                id="femenino"
                                checked
                            />
                             <span class="text-danger" v-if="errores.sexo">
                                {{ errores.sexo[0] }}
                            </span>
                            <label
                                class="form-check-label"
                                for="femenino"
                                >Femenino</label
                            >
                        </div> -->

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
                        <button type="button" class="btn btn-success"  data-dismiss="modal"
                        @click="guardar()">
                            Guardar
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            @click="cerrarModal()">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
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
    data() {
        return {
            persona: {
                nombre: "",
                apellido: "",
                cedula: "",
                correo: "",
                direccion: "",
                sexo: "",
                descripcion: "",
            },
            id: 0,
            modificar: true,
            modal: 0,
            tituloModal: "",
            personas: [],
            errores: {},
        };
    },
    methods: {
        async listar() {
            const res =await axios.get("/personas");
            this.personas = res.data;
        },
        async eliminar(id) {
            const res =await axios.delete("/personas/" + id);
            this.listar();
        },
        async guardar() {
            try {
                if (this.modificar) {
                    const res = await axios.put(
                        "/personas/" + this.id,
                        this.persona
                    );
                } else {
                    const res = await axios.post("/personas", this.persona);
                }
                this.cerrarModal();
                this.listar();
            } catch (error) {
                console.log("probandoCatch");
                if (error.response.data) {
                    this.errores = error.response.data.errors;
                }
                console.log(error.response.data);
            }
        },
        abrirModal(data = {}) {
            this.modal = 1;
            if (this.modificar) {
                this.tituloModal = "Modificar Usuario";
                this.id = data.id;
                this.persona.nombre = data.nombre;
                this.persona.apellido = data.apellido;
                this.persona.cedula = data.cedula;
                this.persona.correo = data.correo;
                this.persona.direccion = data.direccion;
                this.persona.sexo = data.sexo;
                this.persona.descripcion = data.descripcion;
            } else {
                this.id = 0;
                this.tituloModal = "Crear Usuario";
                this.persona.nombre = "";
                this.persona.apellido = "";
                this.persona.cedula = "";
                this.persona.correo = "";
                this.persona.direccion = "";
                this.persona.sexo = "";
                this.persona.descripcion = "";
            }
        },
        cerrarModal() {
            this.modal = 0;
        },
    },
    created() {
        this.listar();
    },
};
</script>

<style>
.mostrar {
    display: list-item;
    opacity: 1;
    background: rgba(6, 7, 10, 0.548);
}
</style>
