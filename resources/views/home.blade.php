<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Vuetify</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>

    <div id="app">
        <v-app id="inspire">
            <v-app id="sandbox">

                <v-navigation-drawer v-model="primaryDrawer.model" :clipped="primaryDrawer.clipped"
                    :floating="primaryDrawer.floating" :mini-variant="primaryDrawer.mini"
                    :permanent="primaryDrawer.type === 'permanent'" :temporary="primaryDrawer.type === 'temporary'" app
                    overflow>


                    <v-list>

                        <v-list-item class="d-flex justify-center">
                            <v-list-item-avatar>
                                <!--<v-img src="https://cdn.vuetifyjs.com/images/john.png"></v-img>-->
                                <v-avatar
                                color="primary"
                                size="48"
                                >
                                <span class="white--text text-h5">PG</span>
                                </v-avatar>
                            </v-list-item-avatar>
                        </v-list-item>

                        <v-list-item>
                            <v-list-item-content>
                                <v-list-item-title class="text-h6">
                                    Pedro Guzmán
                                </v-list-item-title>
                                <v-list-item-subtitle>pedro@guzman.com</v-list-item-subtitle>
                            </v-list-item-content>

                            <v-list-item-action>
                                <v-icon>mdi-code-braces</v-icon>
                            </v-list-item-action>
                        </v-list-item>
                    </v-list>

                    <v-divider></v-divider>


                    <!-- MENU DE NAVEGACION -->
                    <v-list nav dense>

                        <v-list-item-group v-model="selectedItem" color="primary">

                            <v-list-item v-for="(item, i) in items" :key="i" :to="item.to">
                                <v-list-item-icon>
                                    <v-icon v-text="item.icon"></v-icon>
                                </v-list-item-icon>

                                <v-list-item-content>
                                    <v-list-item-title v-text="item.text"></v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                        </v-list-item-group>

                    </v-list>


                </v-navigation-drawer>

                <v-app-bar :clipped-left="primaryDrawer.clipped" app>
                    <v-app-bar-nav-icon v-if="primaryDrawer.type !== 'permanent'"
                        @click.stop="primaryDrawer.model = !primaryDrawer.model"></v-app-bar-nav-icon>
                    <v-toolbar-title>Vuetify</v-toolbar-title>
                </v-app-bar>

                <v-main>
                    <v-container fluid>
                        <router-view></router-view>
                    </v-container>
                </v-main>

                <v-footer :inset="footer.inset" app>
                    <span class="px-4">&copy; 2021</span>
                </v-footer>
            </v-app>
        </v-app>
    </div>

    
 

    <!-- VUE CHARTJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/vue-chartjs/dist/vue-chartjs.min.js"></script>
    


    <script src="{{ asset('js/app.js') }}"></script>

    

</body>

</html>
