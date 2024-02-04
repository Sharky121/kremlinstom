(function(angular) {
    var app = angular.module('app', ['errorShow','ui.bootstrap','cgBusy','ntt.TreeDnD','ngAnimate','toaster','cgBusy','angularFileUpload','angular-sortable-view','ngRoute', 'route-segment', 'view-segment', 'wt.responsive', 'ngTable','LocalStorageModule','formstamp',"treeControl","flow",'minicolors','ngSanitize'])
        .value('cgBusyDefaults',{
            message:'Ждите ...',
            backdrop: true,
            delay: 0,
            minDuration: 0,
            callback:function(){
            }
        })
        .config(function($routeSegmentProvider,$routeProvider,localStorageServiceProvider){

        localStorageServiceProvider.setPrefix('sk');
        localStorageServiceProvider.setStorageType('Cookie');
        $routeSegmentProvider
            .when("/","panel")
            .segment('panel', {
                templateUrl:  "apanel/views/index.html",
                controller: 'cpCtrl'
            });

        function setRouter($routeSegmentProvider,options){
            var option = Object.assign({
                title:'Список',
                lk:'def',
                drag:true,
                fr_key:'title'
            },options);

            var link = option.lk;
            if(link=='def'){
                return false;
            }
            $routeSegmentProvider
                .when("/"+link,"panel."+link)
                .within('panel')
                .segment(link,{
                    templateUrl: "apanel/views/defaultList.html",
                    controller: 'defaultList',
                    resolve: {
                        options: function(){
                            return option;
                        }
                    }
                });
            $routeSegmentProvider
                .when("/"+link+"/:id/edit","panel."+link+"."+link+"Edit")
                .within('panel')
                .within(link)
                .segment(link+"Edit",{
                    templateUrl: "apanel/views/"+link+"Edit.html",
                    controller: 'defaultEdit',
                    dependencies: ['id'],
                    resolve: {
                        options: function(){
                            return {
                                action:'edit',
                                lk:link
                            };
                        }
                    }
                });
            $routeSegmentProvider
                .when("/"+link+"/new","panel."+link+"."+link+"New")
                .within('panel')
                .within(link)
                .segment(link+"New",{
                    templateUrl: "apanel/views/"+link+"Edit.html",
                    controller: 'defaultEdit',
                    resolve: {
                        options: function(){
                            return {
                                action:'new',
                                lk:link
                            };
                        }
                    }
                });
        }

        $routeSegmentProvider
            .when("/pages","panel.pages")
            .within('panel')
            .segment("pages",{
                templateUrl: "apanel/views/pages.html",
                controller: 'PagesList',
                dependencies: ['id']

            });

        $routeSegmentProvider
            .when("/pages/:id/edit","panel.pages.pagesEdit")
            .within('panel')
            .within('pages')
            .segment("pagesEdit",{
                templateUrl: "apanel/views/pagesEdit.html",
                controller: 'PagesEdit',
                dependencies: ['id'],
                resolve: {
                    options: function(){
                        return {action:'edit'};
                    }
                }
            });

            $routeSegmentProvider
                .when("/pages/new","panel.pages.pagesNew")
                .within('panel')
                .within('pages')
                .segment("pagesNew",{
                    templateUrl: "apanel/views/pagesEdit.html",
                    controller: 'PagesEdit',
                    resolve: {
                        options: function(){
                            return { action:'new' };
                        }
                    }
                });
            $routeSegmentProvider
                .when("/pages/:parent/new","panel.pages.pagesNew")
                .within('panel')
                .within('pages')
                .segment("pagesNew",{
                    templateUrl: "apanel/views/pagesEdit.html",
                    controller: 'PagesEdit',
                    dependencies: ['parent'],
                    resolve: {
                        options: function(){
                            return { action:'new' };
                        }
                    }
                });

        $routeSegmentProvider
            .when("/profile","panel.profile")
            .within('panel')
            .segment("profile",{
                        templateUrl: "apanel/views/profile.html",
                        controller: 'ProfileEdit'
                    });


        $routeSegmentProvider
            .when("/users","panel.users")
            .within('panel')
            .segment("users",{
                    templateUrl: "apanel/views/users.html",
                    controller: 'UsersList'
                });
        $routeSegmentProvider
            .when("/users/:id/edit","panel.users.usersEdit")
            .within('panel')
            .within('users')
            .segment("usersEdit",{
                templateUrl: "apanel/views/usersEdit.html",
                controller: 'UsersEdit',
                dependencies: ['id'],
                resolve: {
                    options: function(){
                        return {action:'edit'};
                    }
                }
            });
        $routeSegmentProvider
            .when("/users/new","panel.users.usersNew")
            .within('panel')
            .within('users')
            .segment("usersNew",{
                templateUrl: "apanel/views/usersEdit.html",
                controller: 'UsersEdit',
                resolve: {
                    options: function(){
                        return { action:'new' };
                    }
                }
            });

        $routeSegmentProvider
            .when("/workers","panel.workers")
            .within('panel')
            .segment("workers",{
                templateUrl: "apanel/views/workers.html",
                controller: 'WorkersList'
            });
        $routeSegmentProvider
            .when("/workers/:id/edit","panel.workers.workersEdit")
            .within('panel')
            .within('workers')
            .segment("workersEdit",{
                templateUrl: "apanel/views/workersEdit.html",
                controller: 'WorkersEdit',
                dependencies: ['id'],
                resolve: {
                    options: function(){
                        return {action:'edit'};
                    }
                }
            });
        $routeSegmentProvider
            .when("/workers/new","panel.workers.workersNew")
            .within('panel')
            .within('workers')
            .segment("workersNew",{
                templateUrl: "apanel/views/workersEdit.html",
                controller: 'WorkersEdit',
                resolve: {
                    options: function(){
                        return { action:'new' };
                    }
                }
            });
        $routeSegmentProvider
            .when("/workers/:worker/experiences","panel.workers.workersExperiences")
            .within('panel')
            .within('workers')
            .segment("workersExperiences",{
                templateUrl: "apanel/views/defaultList.html",
                controller: 'experiencesList',
                dependencies: ['worker'],
                resolve: {
                    options: function(){
                        return {
                            title:'Работы',
                            lk:'experiences',
                            drag:true,
                            fr_key:'title'
                        };
                    }
                }
            });
        $routeSegmentProvider
            .when("/workers/:worker/experiences/:id/edit","panel.workers.workersExperiences.experienceEdit")
            .within('panel')
            .within('workers')
            .within('workersExperiences')
            .segment("experienceEdit",{
                templateUrl: "apanel/views/experienceEdit.html",
                controller: 'experienceEdit',
                dependencies: ['worker','id'],
                resolve: {
                    options: function(){
                        return {action:'edit'};
                    }
                }
            });
        $routeSegmentProvider
            .when("/workers/:worker/experiences/new","panel.workers.workersExperiences.experienceNew")
            .within('panel')
            .within('workers')
            .within('workersExperiences')
            .segment("experienceNew",{
                templateUrl: "apanel/views/experienceEdit.html",
                controller: 'experienceEdit',
                dependencies: ['worker'],
                resolve: {
                    options: function(){
                        return { action:'new' };
                    }
                }
            });
            $routeSegmentProvider
                .when("/services","panel.services")
                .within('panel')
                .segment("services",{
                    templateUrl: "apanel/views/services.html",
                    controller: 'servicesList'
                });
            $routeSegmentProvider
                .when("/services/:id/edit","panel.services.servicesEdit")
                .within('panel')
                .within('services')
                .segment("servicesEdit",{
                    templateUrl: "apanel/views/servicesEdit.html",
                    controller: 'servicesEdit',
                    dependencies: ['id'],
                    resolve: {
                        options: function(){
                            return {action:'edit'};
                        }
                    }
                });
            $routeSegmentProvider
                .when("/services/new","panel.services.servicesNew")
                .within('panel')
                .within('services')
                .segment("servicesNew",{
                    templateUrl: "apanel/views/servicesEdit.html",
                    controller: 'servicesEdit',
                    resolve: {
                        options: function(){
                            return { action:'new' };
                        }
                    }
                });

            $routeSegmentProvider
                .when("/dopservices","panel.dopservices")
                .within('panel')
                .segment("dopservices",{
                    templateUrl: "apanel/views/defaultList.html",
                    controller: 'defaultList',
                    resolve: {
                        options: function(){
                            return {
                                title:'Доп. услуги и материалы',
                                lk:'dopservices',
                                drag:false,
                                fr_key:'title'
                            };
                        }
                    }
                });
            $routeSegmentProvider
                .when("/dopservices/:id/edit","panel.dopservices.dopservicesEdit")
                .within('panel')
                .within('dopservices')
                .segment("dopservicesEdit",{
                    templateUrl: "apanel/views/dop_servicesEdit.html",
                    controller: 'defaultEdit',
                    dependencies: ['id'],
                    resolve: {
                        options: function(){
                            return {
                                action:'edit',
                                lk:'dopservices'
                            };
                        }
                    }
                });
            $routeSegmentProvider
                .when("/dopservices/new","panel.dopservices.dopservicesNew")
                .within('panel')
                .within('dopservices')
                .segment("dopservicesNew",{
                    templateUrl: "apanel/views/dop_servicesEdit.html",
                    controller: 'defaultEdit',
                    resolve: {
                        options: function(){
                            return {
                                action:'new',
                                lk:'dopservices'
                            };
                        }
                    }
                });

            $routeSegmentProvider
                .when("/news","panel.news")
                .within('panel')
                .segment("news",{
                    templateUrl: "apanel/views/defaultList.html",
                    controller: 'defaultList',
                    resolve: {
                        options: function(){
                            return {
                                title:'Новости',
                                lk:'news',
                                drag:false,
                                fr_key:'title'
                            };
                        }
                    }
                });
            $routeSegmentProvider
                .when("/news/:id/edit","panel.news.newsEdit")
                .within('panel')
                .within('news')
                .segment("newsEdit",{
                    templateUrl: "apanel/views/newsEdit.html",
                    controller: 'defaultEdit',
                    dependencies: ['id'],
                    resolve: {
                        options: function(){
                            return {
                                action:'edit',
                                lk:'news'
                            };
                        }
                    }
                });
            $routeSegmentProvider
                .when("/news/new","panel.news.newsNew")
                .within('panel')
                .within('news')
                .segment("newsNew",{
                    templateUrl: "apanel/views/newsEdit.html",
                    controller: 'defaultEdit',
                    resolve: {
                        options: function(){
                            return {
                                action:'new',
                                lk:'news'
                            };
                        }
                    }
                });

            $routeSegmentProvider
                .when("/actions","panel.actions")
                .within('panel')
                .segment("actions",{
                    templateUrl: "apanel/views/defaultList.html",
                    controller: 'defaultList',
                    resolve: {
                        options: function(){
                            return {
                                title:'Акции',
                                lk:'actions',
                                drag:true,
                                fr_key:'title'
                            };
                        }
                    }
                });
            $routeSegmentProvider
                .when("/actions/:id/edit","panel.actions.actionsEdit")
                .within('panel')
                .within('actions')
                .segment("actionsEdit",{
                    templateUrl: "apanel/views/actionsEdit.html",
                    controller: 'defaultEdit',
                    dependencies: ['id'],
                    resolve: {
                        options: function(){
                            return {
                                action:'edit',
                                lk:'actions'
                            };
                        }
                    }
                });
            $routeSegmentProvider
                .when("/actions/new","panel.actions.actionsNew")
                .within('panel')
                .within('actions')
                .segment("actionsNew",{
                    templateUrl: "apanel/views/actionsEdit.html",
                    controller: 'defaultEdit',
                    resolve: {
                        options: function(){
                            return {
                                action:'new',
                                lk:'actions'
                            };
                        }
                    }
                });

            $routeSegmentProvider
                .when("/experience","panel.experience")
                .within('panel')
                .segment("experience",{
                    templateUrl: "apanel/views/defaultList.html",
                    controller: 'defaultList',
                    resolve: {
                        options: function(){
                            return {
                                title:'Опыт',
                                lk:'experiences',
                                drag:false,
                                fr_key:'title'
                            };
                        }
                    }
                });
            $routeSegmentProvider
                .when("/experience/:id/edit","panel.experience.experienceEdit")
                .within('panel')
                .within('experience')
                .segment("experienceEdit",{
                    templateUrl: "apanel/views/experienceEdit.html",
                    controller: 'defaultEdit',
                    dependencies: ['id'],
                    resolve: {
                        options: function(){
                            return {
                                action:'edit',
                                lk:'experience'
                            };
                        }
                    }
                });
            $routeSegmentProvider
                .when("/experience/new","panel.experience.experienceNew")
                .within('panel')
                .within('experience')
                .segment("experienceNew",{
                    templateUrl: "apanel/views/experienceEdit.html",
                    controller: 'defaultEdit',
                    resolve: {
                        options: function(){
                            return {
                                action:'new',
                                lk:'experience'
                            };
                        }
                    }
                });


            $routeSegmentProvider
                .when("/reviews","panel.reviews")
                .within('panel')
                .segment("reviews",{
                    templateUrl: "apanel/views/reviewsList.html",
                    controller: 'reviewsList',
                    resolve: {
                        options: function(){
                            return {
                                title:'Отзывы',
                                lk:'reviews',
                                drag:false,
                                fr_key:'title'
                            };
                        }
                    }
                });
            $routeSegmentProvider
                .when("/reviews/:id/edit","panel.reviews.reviewsEdit")
                .within('panel')
                .within('reviews')
                .segment("reviewsEdit",{
                    templateUrl: "apanel/views/reviewsEdit.html",
                    controller: 'reviewsEdit',
                    dependencies: ['id'],
                    resolve: {
                        options: function(){
                            return {
                                action:'edit',
                                lk:'reviews'
                            };
                        }
                    }
                });
            $routeSegmentProvider
                .when("/reviews/new","panel.reviews.reviewsNew")
                .within('panel')
                .within('reviews')
                .segment("reviewsNew",{
                    templateUrl: "apanel/views/reviewsEdit.html",
                    controller: 'reviewsEdit',
                    resolve: {
                        options: function(){
                            return {
                                action:'new',
                                lk:'reviews'
                            };
                        }
                    }
                });


            $routeSegmentProvider
                .when("/questions","panel.questions")
                .within('panel')
                .segment("questions",{
                    templateUrl: "apanel/views/questionsList.html",
                    controller: 'questionsList',
                    resolve: {
                        options: function(){
                            return {
                                title:'Вопросы',
                                lk:'questions',
                                drag:false,
                                fr_key:'title'
                            };
                        }
                    }
                });
            $routeSegmentProvider
                .when("/questions/:id/edit","panel.questions.questionsEdit")
                .within('panel')
                .within('questions')
                .segment("questionsEdit",{
                    templateUrl: "apanel/views/questionsEdit.html",
                    controller: 'defaultEdit',
                    dependencies: ['id'],
                    resolve: {
                        options: function(){
                            return {
                                action:'edit',
                                lk:'questions'
                            };
                        }
                    }
                });
            $routeSegmentProvider
                .when("/questions/new","panel.questions.questionsNew")
                .within('panel')
                .within('questions')
                .segment("questionsNew",{
                    templateUrl: "apanel/views/questionsEdit.html",
                    controller: 'defaultEdit',
                    resolve: {
                        options: function(){
                            return {
                                action:'new',
                                lk:'questions'
                            };
                        }
                    }
                });

            $routeSegmentProvider
                .when("/prices","panel.prices")
                .within('panel')
                .segment("prices",{
                    templateUrl: "apanel/views/prices.html",
                    controller: 'Prices',
                    resolve: {
                        options: function(){
                            return {
                                title:'Загрузка/выгрузка цен',
                                lk:'prices',

                            };
                        }
                    }
                });



            //$routeSegmentProvider
            //    .when("/baners2","panel.baners2")
            //    .within('panel')
            //    .segment("baners2",{
            //        templateUrl: "apanel/views/defaultList.html",
            //        controller: 'defaultList',
            //        resolve: {
            //            options: function(){
            //                return {
            //                    title:'Баннеры большие',
            //                    lk:'baners2',
            //                    drag:false,
            //                    fr_key:'parent'
            //                };
            //            }
            //        }
            //    });
            //$routeSegmentProvider
            //    .when("/baners2/:id/edit","panel.baners2.baners2Edit")
            //    .within('panel')
            //    .within('baners2')
            //    .segment("baners2Edit",{
            //        templateUrl: "apanel/views/banersEdit.html",
            //        controller: 'defaultEdit',
            //        dependencies: ['id'],
            //        resolve: {
            //            options: function(){
            //                return {
            //                    action:'edit',
            //                    lk:'baners2'
            //                };
            //            }
            //        }
            //    });
            //$routeSegmentProvider
            //    .when("/baners2/new","panel.baners2.baners2New")
            //    .within('panel')
            //    .within('baners2')
            //    .segment("baners2New",{
            //        templateUrl: "apanel/views/banersEdit.html",
            //        controller: 'defaultEdit',
            //        resolve: {
            //            options: function(){
            //                return {
            //                    action:'new',
            //                    lk:'baners2'
            //                };
            //            }
            //        }
            //    });

            setRouter($routeSegmentProvider,{
                title:'Список заболеваний',
                lk:'diseases'
                });
            setRouter($routeSegmentProvider,{
                title:'Список галерей',
                lk:'gallery'
            });
            setRouter($routeSegmentProvider,{
                title:'Баннеры',
                lk:'baners'
            });
            setRouter($routeSegmentProvider,{
                title:'Список специализаций',
                lk:'specializations'
            });
            setRouter($routeSegmentProvider,{
                title:'Список клиник',
                lk:'clinics',
                drag:false
            });
            setRouter($routeSegmentProvider,{
                title:'Технологии',
                lk:'technologies',
                drag:true
            });

            setRouter($routeSegmentProvider,{
                title:'Видео',
                lk:'video',
                drag:true
            });

            setRouter($routeSegmentProvider,{
                title:'Блог',
                lk:'blog',
                drag:true,
                fr_key:'blog_id'
            });




    })
    .controller('mainCtrl',mainCtrl);
})(angular);