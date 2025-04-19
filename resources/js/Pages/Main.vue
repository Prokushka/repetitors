<script>
import sleep from "@/func.js";
export default {
    name: "Client",
    data(){
        return{
            slide: false,
            hello: true,
            thisIs: true,
            site: true,
            For: true,
            search: true,
            tutor: true,
            endAnim: true,
            isActive: false,
            type: 'hidden',
            leftMenu: true
        }
    },
    methods:{
        scrolled(){
            this.slide = true
        },

        start(){
            (async () => {
                    await sleep(400)
                    this.hello = false
                    await sleep(400)
                    this.thisIs = false
                     await sleep(400)
                    this.site = false
                    await sleep(400)
                    this.For = false
                     await sleep(400)
                    this.search = false
                    await sleep(400)
                    this.tutor = false
                    await sleep(2200)
                    this.endAnim = false

            }
            )()
        },
        animate(){
            document.querySelector('#twoShadow')
        },

        openLeftMenu(){
            const leftMenuIcon = document.getElementById('left-menu-icon')
            if (this.leftMenu === false){
                leftMenuIcon.classList.replace('ri-close-fill', 'ri-menu-line')
                this.leftMenu = true
                leftMenuIcon.animate('animate-leftMenu').reverse()
            }else{
                leftMenuIcon.classList.replace('ri-menu-line', 'ri-close-fill')
                this.leftMenu = false

            }
        }

    },
    mounted() {
        this.start()
        this.animate()

    }
}
</script>

<template>
    <div id="all" class="overflow-hidden w-full h-screen  relative">
        <img class="absolute z-10  lg:inset-48 inset-0  -rotate-45 text-white bg-fixed" width="600px" src="http://localhost/storage/back-flower.png" alt="">
        <img class="absolute z-10 sm:hidden md:hidden xl:block lg:hidden top-48 right-40 skew-12  -rotate-45 text-white bg-fixed" width="600px" src="http://localhost/storage/back-flower.png" alt="">
        <img class=" absolute z-10 sm:hidden md:hidden xl:block lg:block  -top-52 right-40 skew-12 -rotate-90 text-white bg-fixed" width="200px" src="http://localhost/storage/back-flower.png" >
        <div id="first" class="absolute z-30 w-full top-0 overflow-hidden  ">
            <section class=""> <!--top sidebar-->
                <div class=" justify-center shadow-violet-950   bg-violet-950 snap-always text-white">

                    <nav class="py-3 sm:hidden lg:block text-[25px] shadow-md  rounded-b-md">
                        <ul class="flex justify-items-start  ">
                            <li class=" ml-3 mr-5 ">
                                <a href="#"></a>Client Part
                            </li>
                            <li class="mx-3 ">
                                <a href="#">Profile</a>
                            </li>
                            <li class="mx-3 ">
                                <a href="#">Category</a>
                            </li>
                            <li class="mx-3 ">
                                <a href="#">Likes</a>
                            </li>
                            <li class="mx-3 ">
                                <a href="#">Images</a>
                            </li>
                            <li class="mx-3 ">
                                <a href="#">Rating</a>
                            </li>
                        </ul>
                        <div class="absolute  flex-row top-3 right-2">
                            <div>
                                <a href="#">Login</a>
                                <a class="px-3" href="#">Register</a>
                            </div>
                        </div>
                    </nav>
                </div>

            </section>

        </div>
        <section id="left-navbar" :class="{'animate-leftMenu' : !leftMenu, 'border-r-2' : !leftMenu}" class=" border-white left-0 z-40  text-white rounded-r-lg h-full text-2xl px-2 bg-violet-950 absolute sm:block lg:hidden"><!--NAVBAR-LEFT-->

            <div class="relative  " >
                <i id="left-menu-icon"  @click.prevent="openLeftMenu" class="right-2 ri-menu-line"></i>
                <nav :class="{'hidden' : leftMenu}"  class="  right-2 self-end h-full  absolute text-end rounded-t-none rounded-r-lg  text-white  ">

                    <ul class="w-auto text-[25px]  ">
                        <li class="pb-1 "><a :class="{'text-blue-800': isActive}" href="#"><span :class="{'hidden' : leftMenu}">Профили</span><i class="ri-profile-line ml-2"></i></a></li>
                        <li class="pb-1 "><a href="#"><span :class="{'hidden' : leftMenu}">Категории</span><i class="ri-menu-search-line ml-2 "></i></a></li>
                        <li class="pb-1 "><a href="#"><span :class="{'hidden' : leftMenu}">Лайки</span><i class="ri-heart-line ml-2 "></i></a></li>
                        <li class="pb-1 "><a href="#"><span :class="{'hidden' : leftMenu}">Изображения</span><i class="ri-image-line ml-2 "></i></a></li>
                        <li class="pb-1 "><a href="#"><span :class="{'hidden' : leftMenu}">Рейтинг</span><i class="ri-shake-hands-line ml-2 "></i></a></li> <!--rating-->

                    </ul>
                </nav>
            </div>

        </section>
        <div id="scrollbars" class=" overflow-y-scroll  scroll-smooth h-screen  top-14 absolute w-full z-30 flex-col  snap-y">
            <section class="z-20 " id="search">
                <div class="container mt-5 place-content-center relative w-[600px] ">
                    <i class="ri-search-2-line  text-violet-900 text-xl absolute top-[3px] right-2   "></i>
                    <input class="rounded-md ring-4 mb-1 ring-violet-950/35 outline-2 outline-violet-700  text-2xl w-full placeholder:text-gray-500 placeholder:text-center" placeholder="Search!" type="text" >
                </div>
            </section>
            <section  class="z-20 container scroll-auto  break-normal  snap-start lg:scroll-my-96 pt-2  h-screen   " id="main">
                <div  class="mt-5 xl:animate-slide  relative border-white border  bg-violet-950/70 xl:w-[1300px] xl:h-[750px] sm:w-auto sm:h-auto h-auto w-auto rounded-3xl  place-self-center shadow-2xl shadow-violet-950">
                    <div class="absolute xl:block sm:hidden lg:animate-hardAnimation bg-white place-content-center rounded-full size-10">
                    </div>
                    <div class="absolute xl:block sm:hidden lg:animate-shadow bg-white place-content-center rounded-full opacity-50 size-10">
                    </div>
                    <div id="twoShadow" class="absolute xl:block sm:hidden lg:animate-twoShadow bg-white place-content-center rounded-full opacity-30 size-10">
                    </div>
                    <div class="w-full text-white xl:block sm:hidden  text-center pt-[50px] pl-[35px]">
                    </div>
                    <div class="text-white text-pretty  xl:text-[55px] sm:text-[25px]   pt-16 pl-4">

                           <div class="text-pretty xl:text-start lg:text-center  ">
                               <span class="xl:ml-16 xl:mr-5 lg:mr-4 sm:mr-2" :class="{'hidden' : hello}">Привет,</span>
                               <span class="xl:mr-5 lg:mr-4 sm:mr-2 " :class="{'hidden' : thisIs}">это</span>
                               <span class="xl:mr-5 lg:mr-4 sm:mr-2" :class="{'hidden' : site}">cайт</span>
                               <span class="xl:mr-5 lg:mr-4 sm:mr-2" :class="{'hidden' : For}">для</span>
                               <span class="xl:mr-5 lg:mr-4 sm:mr-2" :class="{'hidden' : search}">поиска</span>
                               <span class="xl:mr-5 lg:mr-4 sm:mr-2" :class="{'hidden' : tutor}">репетиторов</span>
                           </div>
                        <div class="absolute sm:w-0 sm:h-0  top-[90px] right-[86px] bg-white xl:w-2 xl:h-11 rounded-full" :class="{'hidden' : endAnim, 'animate-exclamation' : !endAnim}"></div>
                        <div class="lg:mt-20 md:mt-10 pb-12 tracking-wider container place-content-center lg:text-2xl md:text-xl sm:text-lg xl:text-3xl w-3/4" :class="{'hidden' : endAnim, 'animate-exclamation' : !endAnim}">
                            Добро пожаловать на платформу, где обучение становится доступным, комфортным и эффективным!
                            Мы собрали опытных репетиторов со всей России, чтобы помочь вам достичь ваших образовательных целей.
                            Независимо от того, изучаете ли вы иностранные языки,
                            готовитесь к экзаменам или хотите освоить новые навыки, у нас есть подходящий специалист для вас.</div>
                    </div>
                </div>
            </section>
            <section  class="z-20 container scroll-m-96 scroll-auto snap-start pt-2  h-screen sm:my-5 md:my-32 lg:my-64" id="option">
                <div  class="mt-5 animate-slide   bg-violet-950/40 w-full h-auto rounded-3xl  place-self-center shadow-2xl shadow-violet-950">
                    <div class="text-white text-3xl text-center mt-3 bg-violet-950 w-full p-3 rounded-full">
                        Выберите дисциплину
                    </div>
                    <div class="w-full text-white grid lg:grid-cols-2 md:grid-cols-1 place-content-center lg:gap-x-24 sm:grid-cols-1 xl:grid-cols-3 md:gap-y-[20px]   sm:gap-y-[30px] xl:gap-y-[50px] lg:gap-y-[40px] sm:grid-rows-1 md:grid-rows-1 xl:grid-rows-2 text-center pt-[50px]  ">
                        <div class="xl:w-full sm:w-full sm:h-[440px] xl:h-[325px]   border-8 rounded-lg bg-violet-950/85  relative place-content-center  border-violet-950">
                            <i class=" absolute  opacity-30  xl:text-[250px] sm:text-[325px]  sm:-bottom-[5%] sm:left-[18%]  xl:-bottom-10 xl:left-7 ri-braces-fill"></i> Математика
                        </div>
                        <div class="xl:w-full sm:w-full sm:h-[440px] xl:h-[325px]   border-8 rounded-lg bg-violet-950/85  relative place-content-center  border-violet-950">
                            <i class=" ri-edit-line absolute  opacity-30  xl:text-[250px] sm:text-[325px]  sm:-bottom-[5%] sm:left-[18%]  xl:-bottom-10 xl:left-7"></i>
                            Русский язык
                        </div>
                        <div class="xl:w-full sm:w-full sm:h-[440px] xl:h-[325px]   border-8 rounded-lg bg-violet-950/85  relative place-content-center  border-violet-950">
                            Химия
                            <i class=" ri-ink-bottle-fill absolute  opacity-30  xl:text-[250px] sm:text-[325px]  sm:-bottom-[5%] sm:left-[18%]  xl:-bottom-10 xl:left-7 "></i>
                        </div>
                        <div class="xl:w-full sm:w-full sm:h-[440px] xl:h-[325px]   border-8 rounded-lg bg-violet-950/85  relative place-content-center  border-violet-950">
                            Иностранные языки
                            <i class=" ri-article-line absolute  opacity-30  xl:text-[250px] sm:text-[325px]  sm:-bottom-[5%] sm:left-[18%]  xl:-bottom-10 xl:left-7 "></i>
                        </div>
                        <div class="xl:w-full sm:w-full sm:h-[440px] xl:h-[325px]   border-8 rounded-lg bg-violet-950/85  relative place-content-center  border-violet-950">
                            Физика
                            <i class=" ri-landscape-ai-line absolute xl:text-[250px] sm:text-[325px]  sm:-bottom-[5%] sm:left-[18%]  xl:-bottom-10 xl:left-7 opacity-30 "></i>
                        </div>
                        <div class="xl:w-full sm:w-full sm:h-[440px] xl:h-[325px]   border-8 rounded-lg bg-violet-950/85  relative place-content-center  border-violet-950">
                            Информационные технологии
                            <i class="  ri-computer-line absolute  opacity-30  xl:text-[250px] sm:text-[325px]  sm:-bottom-[5%] sm:left-[18%]  xl:-bottom-10 xl:left-7 "></i>
                        </div>
                    </div>
                </div>
            </section>
            <section class="z-20 container md:hidden sm:hidden xl:block lg:block snap-start scroll-m-[500px] scroll-auto pt-2 h-screen " id="scroll-animate">
                <div :class="{'animate-slide': slide }" @scroll="scrolled" class="text-white  bg-violet-950/40 w-[1450px] h-[700px] place-self-center  overflow-hidden rounded-lg mt-10 shadow-lg  shadow-violet-950 border-[50px] border-opacity-45 border-violet-900/50">
                    <div   class="mt-5 pl-[230px] pt-24 grid-rows-1 justify-items-center grid-cols-6 gap-x-[450px] inline-grid animate-scrolling ">
                        <div class="bg-violet-950 rounded-lg px-4 py-3 text-pretty shadow-2xl shadow-violet-950 h-[375px] w-[400px]  ">
                            Кружевной ресторан «Мелани», поворот, статуя, пробежка, нежелательный край,
                            падение винограда, канал, битва, Пэт Дрейк, десерт, невестка, кальмар, ныряющий за ногтями, талантливый завиток, музыкальная кривая, женщина, плодородный нарцисс, майонез, крик, миниатюрная песня, полиция, предложение, жизнь, отвратительно?
                        </div>
                        <div class="  bg-violet-950 rounded-lg p-4 text-pretty shadow-2xl shadow-violet-950  h-[375px] w-[400px]   ">
                            Узловатый крякающий хватающий сентябрьский собственник ног, аксиоматическое насекомое, неожиданный,  Южная Африка, экзотический диван, тёмный мужчина, злобный кофе, заботливый остроумный молчаливый работодатель, отвратительный.
                        </div>
                        <div class="bg-violet-950 rounded-lg p-4 text-pretty shadow-2xl shadow-violet-950  h-[375px] w-[400px] ">
                            Восторженная опасная кипящая боулинг-команда, дрожащее платье, ненавистный важный осьминог, стойкая подводка для глаз, узкая, замечательная, спасибо, доверие, обильная, туфелька, решительная, Северная Америка, устрица, простой закон, непобедимый, голодный, оккупация, ботаника, восторженная тыква?
                        </div>
                        <div class=" bg-violet-950 rounded-lg p-4 text-pretty shadow-2xl shadow-violet-950  h-[375px] w-[400px]  ">
                            Форма вечерняя стирка Пакистан посвящение азоту крайний срок вывод из памяти прямоугольник Северная Корея тишина,Патриция официант пресса импортный Козерог розовый, жёсткий патио крутая кроватка, канал яростный разброс.
                        </div>
                        <div class="bg-violet-950 rounded-lg p-4 text-pretty shadow-2xl shadow-violet-950 h-[375px] w-[400px]  ">
                            Оптовый канал Ayar Tools специализируется на поставках высококачественных инструментов, расходных материалов. Мы сотрудничаем со строительными компаниями, розничными сетями, мастерскими и дистрибьюторами, предлагая выгодные условия и индивидуальный подход.
                        </div>
                        <div class=" bg-violet-950 rounded-lg p-4 text-pretty shadow-2xl shadow-violet-950 h-[375px] w-[400px] ">
                            Оптовый магазин Ayar Home предлагает широкий ассортимент текстиля
                            Мы предлагаем продукцию из таких стран как:
                            Узбекистан;Турция;Пакистан;Россия;Китай
                        </div>
                    </div>
                </div>
            </section>
            <section class="mt-56 z-20 md:hidden sm:hidden xl:block lg:block text-white rounded-t-lg snap-end bg-violet-950 w-full h-[250px] pt-2 ">
                <div class=" text-4xl text-center place-content-center ">
                    Контакты
                </div>
                <div class=" h-[2px] bg-white my-2"></div>
                <div class="w-full relative text-xl h-full">

                    <div class="absolute end-2 text-2xl">
                        <a href="#"><i class="ri-telegram-fill text-2xl"></i></a>
                        <a href="#"><i class="ri-whatsapp-fill  mx-2"></i></a>
                        <a href="#"><i class="ri-github-fill"></i></a>
                    </div>
                    <div class="absolute w-56 top-8 end-0 h-[2px] bg-white my-2"></div>
                    <div class="absolute end-2 top-12">
                        <i class=" ri-phone-fill "></i>
                        +79655895014
                    </div>
                    <div class="absolute right-2 bottom-16">
                       Copyright <i class="ri-copyright-fill"></i>
                        Все права защищены 2024-2025
                    </div>
                </div>
            </section>
        </div>

        <i class="ri-service-fill  absolute left-0 animate-movingY opacity-65 top-28 text-[160px]"></i>
        <i class=" absolute right-0 animate-rotating opacity-65 top-56 ri-flower-line text-[160px] "></i>
        <i class="ri-globe-fill absolute left-[25rem] animate-scalingUp opacity-65 top-36 text-[160px]"></i>

    </div>
</template>

<style scoped>

</style>
