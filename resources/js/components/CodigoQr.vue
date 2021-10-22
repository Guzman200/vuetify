<template>
    <div>

        <v-text-field
            label="Nombre"
            placeholder="Ingresa tu nombre"
            outlined
            v-model="value"
            >
        </v-text-field>

        <v-dialog transition="dialog-bottom-transition" max-width="600">
            <template v-slot:activator="{ on, attrs }">
                <v-btn color="primary" v-bind="attrs" v-on="on">Generar código QR</v-btn>
            </template>
            <template v-slot:default="dialog">
                <v-card>
                    <v-toolbar color="primary" dark>Generación de código QR</v-toolbar>
                    <v-card-text>

                        <v-container>
                            <v-row justify="center">
                                <v-col cols="12" md="6">
                                    <v-card>
                                        <v-card-text class="justify-end">
                                            <qrcode-vue :value="value" :size="100"></qrcode-vue>
                                        </v-card-text>
                                    </v-card>
                                </v-col>
                            </v-row>
                        </v-container>

                    </v-card-text>
                    <v-card-actions class="justify-end">
                        <v-btn text @click="dialog.value = false">Cerrar</v-btn>
                    </v-card-actions>
                </v-card>
            </template>
      </v-dialog>
    </div>
</template>

<script>

import QrcodeVue from 'qrcode.vue'

export default {
    components : { QrcodeVue },
    data(){
        return {
            value : ''
        }
    }
}
</script>