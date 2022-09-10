<template>
    <nav ref="nav" class="bg-white w-full flex sticky top-0 z-50 relative justify-between items-center mx-auto px-8 h-20">
        <!-- logo -->
        <div class="inline-flex items-center">
            <router-link to="/">
                <div class="hidden md:flex items-center">
                    <svg v-if="props.siteLogo === 'none' || props.siteLogo.length === 0" width="10mm" height="20mm" version="1.1" viewBox="0 0 139.84 151.18" xmlns="http://www.w3.org/2000/svg"><path d="m112.2 437.34h161.29v157.85h-161.29z" fill="none" stroke-width="3.9891"/><g transform="matrix(.90503 0 0 .88702 -341.78 -178.72)"><g><path d="m455.12 284.31c0.62382 29.47 0.61789 36.331 0.25228 65.795l-32.06-36.103 0.0679-72.629z" fill="#34a853"/><path d="m422.42 346.8-33.197-20.484v-18.737c0-10.305 0.26165-18.737 0.58146-18.737 0.3198 0 15.345 9.05 33.389 20.111l32.807 20.111 31.389 17.895-32.141 20.853-32.829-21.013z" fill="#ea4335" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.3858" style="paint-order:stroke fill markers"/><path d="m488.2 346.8 33.197-20.484v-18.737c0-10.305-0.26165-18.737-0.58146-18.737-0.3198 0-15.345 9.05-33.389 20.111l-32.807 20.111-31.389 17.895 32.141 20.853 32.829-21.013z" fill="#4285f4" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.3858" style="paint-order:stroke fill markers"/><path d="m455.35 263.12-0.91786-56.786 66.622 51.046 0.0539 68.733 1.2182 1.0126z" fill="#fbbc04"/></g></g></svg>
                    <img :src="setLogo(`images/default/${props.siteLogo}`)" class="w-10 h-10" v-else/>
                    <div class="flex flex-col">
                        <h1 class="mx-2 text-xl font-bold text-gray-800 leading-[1.2rem] h-poppins">{{ siteName }}</h1>
                        <h2 class="mx-2 text-xs">{{ siteSubname }}</h2>
                    </div>
                </div>
                <div class="block md:hidden">
                    <svg v-if="props.siteLogo === 'none' || props.siteLogo.length === 0" width="10mm" height="20mm" version="1.1" viewBox="0 0 139.84 151.18" xmlns="http://www.w3.org/2000/svg"><path d="m112.2 437.34h161.29v157.85h-161.29z" fill="none" stroke-width="3.9891"/><g transform="matrix(.90503 0 0 .88702 -341.78 -178.72)"><g><path d="m455.12 284.31c0.62382 29.47 0.61789 36.331 0.25228 65.795l-32.06-36.103 0.0679-72.629z" fill="#34a853"/><path d="m422.42 346.8-33.197-20.484v-18.737c0-10.305 0.26165-18.737 0.58146-18.737 0.3198 0 15.345 9.05 33.389 20.111l32.807 20.111 31.389 17.895-32.141 20.853-32.829-21.013z" fill="#ea4335" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.3858" style="paint-order:stroke fill markers"/><path d="m488.2 346.8 33.197-20.484v-18.737c0-10.305-0.26165-18.737-0.58146-18.737-0.3198 0-15.345 9.05-33.389 20.111l-32.807 20.111-31.389 17.895 32.141 20.853 32.829-21.013z" fill="#4285f4" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.3858" style="paint-order:stroke fill markers"/><path d="m455.35 263.12-0.91786-56.786 66.622 51.046 0.0539 68.733 1.2182 1.0126z" fill="#fbbc04"/></g></g></svg>
                    <img :src="setLogo(`images/default/${props.siteLogo}`)" class="w-10 h-10" v-else/>
                </div>
            </router-link>
        </div>
        <!-- end logo -->

        <!-- search bar -->
        <div class="sm:block flex-shrink flex-grow-0 justify-end px-2">
            <div class="inline-block">
                <div class="inline-flex items-center max-w-full">
                    <div class="flex items-center flex-grow-0 flex-shrink pl-2 relative w-fit lg:w-[40rem] border rounded-full px-1  py-1" type="button">
                        <input @focus="maximizeWidth($event)" @blur="minimizeWidth($event)" @keypress="search($event)" :value="getKeywords()" class="block outline-none ml-2 flex-grow flex-shrink overflow-hidden" placeholder="Masukan kata kunci"/>
                        <div class="flex items-center justify-center relative  h-8 w-8 rounded-full">
                            <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" focusable="false" style="display: block;fill: none;height: 12px;width: 12px;stroke: currentcolor;stroke-width: 5.33333;overflow: visible;">
                                <g fill="none"><path d="m13 24c6.0751322 0 11-4.9248678 11-11 0-6.07513225-4.9248678-11-11-11-6.07513225 0-11 4.92486775-11 11 0 6.0751322 4.92486775 11 11 11zm8-3 9 9"></path></g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end search bar -->

        <!-- login -->
        <div class="flex-initial">
            <div class="flex justify-end items-center relative">        
                <div class="flex mr-4 items-center">
                    <a class="inline-block py-2 px-3 hover:bg-gray-200 rounded-full" href="#">
                        <div class="flex items-center relative cursor-pointer whitespace-nowrap"></div>
                    </a>
                    <div class="block relative">
                    </div>
                </div>

                <div class="hidden">
                    <div class="inline relative">
                        <router-link to="/" class="inline-flex items-center relative px-2 border rounded-full hover:shadow-lg">
                            <div class="pl-1">
                                <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" focusable="false" style="display: block; fill: none; height: 16px; width: 16px; stroke: currentcolor; stroke-width: 3; overflow: visible;"><g fill="none" fill-rule="nonzero"><path d="m2 16h28"></path><path d="m2 24h28"></path><path d="m2 8h28"></path></g></svg>
                            </div>
                            <div class="ml-2">
                                {{ getProfile() }}
                            </div>
                            <div class="block flex-grow-0 flex-shrink-0 h-10 w-12 pl-5">
                                <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" focusable="false" style="display: block; height: 100%; width: 100%; fill: currentcolor;"><path d="m16 .7c-8.437 0-15.3 6.863-15.3 15.3s6.863 15.3 15.3 15.3 15.3-6.863 15.3-15.3-6.863-15.3-15.3-15.3zm0 28c-4.021 0-7.605-1.884-9.933-4.81a12.425 12.425 0 0 1 6.451-4.4 6.507 6.507 0 0 1 -3.018-5.49c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5a6.513 6.513 0 0 1 -3.019 5.491 12.42 12.42 0 0 1 6.452 4.4c-2.328 2.925-5.912 4.809-9.933 4.809z"></path></svg>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
        <!-- end login -->
    </nav>
</template>

<script setup>
    import {ref,onMounted,reactive} from 'vue'
    import {useRoute,useRouter} from 'vue-router'

    // state
    import {useSearch} from '../store/search.js'

    window.addEventListener('scroll', onScroll)

    const nav = ref(null)
    const route = useRoute()
    const router = useRouter()
    const state = useSearch()

    const props = defineProps({
        siteName: String,
        siteSubname: String,
        siteLogo: String
    })

    function maximizeWidth(e)
    {
        if (window.location.innerWidth > 1024) {
            e.target.parentNode.classList.remove('w-[40rem]');
            e.target.parentNode.classList.add('w-[50rem]', 'shadow-md');
        }
        else
        {
        }
    }

    function minimizeWidth(e)
    {
        if (window.location.innerWidth > 1024) {
            e.target.parentNode.classList.remove('w-[50rem]', 'shadow-md');
            e.target.parentNode.classList.add('w-[40rem]');
        }
        else
        {
            e.target.parentNode.classList.add('w-fit');
        }
    }

    function onScroll()
    {
        if (window.scrollY > nav.value?.scrollHeight)
        {
            nav.value?.classList.add('shadow-xl');
        }
        else
        {
            nav.value?.classList.remove('shadow-xl');
        }
    }

    function setLogo(logopath)
    {
        
        return window.location.origin + window.location.pathname + '/' + logopath;
    }

    function getKeywords()
    {
        state.keywords = route.query?.keywords?.replace(/['"]+/g, '').replace(/(<([^>]+)>)/gi, "")
        return state.keywords
    }

    function getProfile()
    {
        let profile = localStorage.getItem('playProfile')

        if (profile?.length > 0)
        {
            return 'Ada'
        }

        return 'Masuk'
    }

    function search(e)
    {
        if (e.key === 'Enter')
        {
            if (route.path !== '/search')
            {
                state.keywords = e.target.value
                router.push({path: '/search', query: {keywords: e.target.value}})
            }
            else
            {
                route.query.keywords = e.target.value
                state.keywords = e.target.value
                state.searchData()
            }
        }
    }
</script>