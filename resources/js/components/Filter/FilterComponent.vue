<template>
    
    <div>
        <a href="#" class="dropdown-trigger btn-flat btn-large" data-target="dropdown-search" id="dropdown-search-button">
            Busca <i class="material-icons right" >search</i>
        </a>

        <div class="dropdown-content" id="dropdown-search">

            <div class="container">

                <div class="row">

                    <div class="input-field col s4">

                        <label for="search-build">Bloco</label>
                        <input type="text" v-model="localDataSerch.build" name="build" id="search-build">

                   </div>
                    
                    <div class="input-field col s4">

                        <label for="search-floor">Andar</label>
                        <input type="text" v-model="localDataSerch.floor" name="floor" id="search-floor">

                    </div>

                    <div class="input-field col s4">

                        <label for="search-local">Local</label>
                        <input type="text" v-model="localDataSerch.local" name="search-local" id="search-local">

                    </div>
                    
                </div>

                <div class="row">

                    <button class="btn waves-effect col s3 left" @click="searchFor()">

                       Buscar <i class="material-icons right">search</i>

                    </button>

                    <button class="btn waves-effect col s3 white black-text right" @click="clear">

                       Limpar <i class="material-icons right">clear</i>

                    </button>

                </div>

            </div>

        </div>

    </div>
    
</template>

<script>

    import {LocalResource} from '../resources/LocalResource';
    import {SearchFilter} from '../mixins/SearchFilter.mixin';
    export default {

        mixins: [SearchFilter],

        mounted () {

            this.initialize();

        },

        data () {

            return {

                localDataSerch: {

                    build: '',
                    floor: '',
                    local: ''

                }

            }

        },

        methods: {

            searchFor () {

                this.list(response => {
                    this.commit(response.data);
                    this.commitFilter(this.localDataSerch);
                }, this.localDataSerch);

            },

            list (action, search) {

                LocalResource.index(action, 1, search);

            },

            clear () {

                this.clearLocalDataSearch();
                this.list(response => {
                    this.commit(response.data);
                    this.commitFilter(this.localDataSerch);
                });

            },

            clearLocalDataSearch () {

                this.localDataSerch.build = '';
                this.localDataSerch.floor = '';
                this.localDataSerch.local = '';

            }

        }

    }
</script>
