import { createWebHistory, createRouter } from 'vue-router';

// Services
import RouteService from "../services/route-service";
import BaseService from "../services/base-service";

/* Auth */
import AdminNotFound from '../components/admin/AdminNotFound';

// Admin routes
import AdminDashboardView from '../components/admin/AdminDashboardView';
import AdminApplicationView from "../components/admin/applications/AdminApplicationView";

import AdminModuleView from "../components/admin/modules/AdminModuleView";
import AdminModuleAssignmentView from "../components/admin/modules/assignments/AdminModuleAssignmentView";
import AdminAssessmentQuestionView from "../components/admin/assessment/questions/AdminAssessmentQuestionView.vue";
import AdminAssessmentView from "../components/admin/assessment/AdminAssessmentView.vue";

import AdminCourseView from "../components/admin/courses/AdminCourseView";
import AdminModuleCourseView from "../components/admin/courses/AdminModuleCourseView";
import AdminCourseResourceView from "../components/admin/courses/resources/AdminCourseResourceView.vue";

import AdminDiagnosticToolResultsView
    from "../components/admin/diagnostic-tool/diagnostic-tool-results/AdminDiagnosticToolResultsView.vue";

// Learning routes
import LearningDashboardView from '../components/learning/LearningDashboardView';

import LearningModuleView from '../components/learning/modules/LearningModuleView.vue';
import LearningModuleAssignmentView from "../components/learning/modules/assignments/LearningModuleAssignmentView.vue";

import LearningModuleAssessmentView from "../components/learning/modules/assessments/LearningModuleAssessmentView.vue";
import LearningModuleAssessmentHistoryView
    from "../components/learning/modules/assessments/LearningModuleAssessmentHistoryView.vue";

import LearningCourseView from '../components/learning/modules/courses/LearningCourseView.vue';
import LearningCourseShow from "../components/learning/modules/courses/LearningCourseShow.vue";

import LearningAccountView from "../components/learning/account/LearningAccountView.vue";
import LearningSelfHelpView from "../components/learning/self-help/LearningSelfHelpView.vue";

// main hub api
const adminUserUrl = process.env.MIX_API_URL+'/api/admin/user';
const adminLogoutUrl = process.env.MIX_API_URL+'/api/admin/logout';

/* Authenticated Component */
const routes = [

    // Admin routes
    {
        // for urls that don't exist
        name: "AdminNotFound",
        path: "/:pathMatch(.*)*",
        component: AdminNotFound,
        meta: {
            requiresAuth: false
        }
    },

    {
        name: "AdminDashboardView",
        path: "/admin/dashboard",
        component: AdminDashboardView,
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                adminUserUrl,
                localStorage.getItem('afc-admin-tk'),
                next,
                '/admin/login',
            )
        },
        meta: {
            title: `Admin Dashboard`
        }
    },

    {
        name: "AdminApplicationView",
        path: '/admin/applications',
        component: AdminApplicationView,
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                adminUserUrl,
                localStorage.getItem('afc-admin-tk'),
                next,
                '/admin/login',
            )
        },
    },

    {
        name: "AdminModuleView",
        path: '/admin/modules',
        component: AdminModuleView,
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                adminUserUrl,
                localStorage.getItem('afc-admin-tk'),
                next,
                '/admin/login',
            )
        },
    },

    {
        name: "AdminModuleAssignmentView",
        path: '/admin/modules/:id/assignments',
        component: AdminModuleAssignmentView,
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                adminUserUrl,
                localStorage.getItem('afc-admin-tk'),
                next,
                '/admin/login',
            )
        },
    },

    {
        name: "AdminAssessmentQuestionView",
        path: '/admin/module/:id/assessment/questions',
        component: AdminAssessmentQuestionView,
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                adminUserUrl,
                localStorage.getItem('afc-admin-tk'),
                next,
                '/admin/login',
            )
        },
    },

    {
        name: "AdminModuleCourseView",
        path: '/admin/module/:id/courses',
        component: AdminModuleCourseView,
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                adminUserUrl,
                localStorage.getItem('afc-admin-tk'),
                next,
                '/admin/login',
            )
        },
    },

    {
        name: "AdminCourseView",
        path: '/admin/courses',
        component: AdminCourseView,
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                adminUserUrl,
                localStorage.getItem('afc-admin-tk'),
                next,
                '/admin/login',
            )
        },
    },

    {
        name: "AdminCourseResourceView",
        path: '/admin/course/:id/resources',
        component: AdminCourseResourceView,
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                adminUserUrl,
                localStorage.getItem('afc-admin-tk'),
                next,
                '/admin/login',
            )
        },
    },

    {
        name: "AdminAssessmentView",
        path: '/admin/assessments',
        component: AdminAssessmentView,
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                adminUserUrl,
                localStorage.getItem('afc-admin-tk'),
                next,
                '/admin/login',
            )
        },
    },


    // Admin Diagnostic Tool
    {
        path: '/admin/user-answer/:id',
        name: "/UserAnswers",
        component: () => import('../components/admin/useranswers/UserAnswers.vue'),
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                adminUserUrl,
                localStorage.getItem('afc-admin-tk'),
                next,
                '/admin/login',
            )
        },
    },

    {
        path: '/admin/diagnostic-questions',
        name: "/DiagnosticQuestions",
        component: () => import('../components/admin/diagnostic-tool/diagnostic-tool-questions/DiagnosticQuest.vue'),
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                adminUserUrl,
                localStorage.getItem('afc-admin-tk'),
                next,
                '/admin/login',
            )
        },
    },

    {
        name: "AdminDiagnosticToolResultsView",
        path: '/admin/diagnostic-tool/results',
        component: AdminDiagnosticToolResultsView,
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                adminUserUrl,
                localStorage.getItem('afc-admin-tk'),
                next,
                '/admin/login',
            )
        },
    },

    {
        path: '/admin/logout',
        name: "AdminLogout",
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                adminLogoutUrl,
                localStorage.getItem('afc-admin-tk'),
                window.location.href = '/admin/login',
                '/admin/login'
            );
            // Delete token after logout
            localStorage.removeItem("afc-admin-tk");
        }
    },

    // Learning Route
    {
        name: "LearningDashboardView",
        path: "/learning/dashboard",
        component: LearningDashboardView,
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                '/api/learning/authenticate',
                localStorage.getItem('brace-learning-tk'),
                next,
                '/learning/login',
            )
        },
        meta: {
            title: `LearningDashboard`
        }
    },

    {
        name: "LearningModuleView",
        path: "/learning/modules",
        component: LearningModuleView,
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                '/api/learning/authenticate',
                localStorage.getItem('brace-learning-tk'),
                next,
                '/learning/login',
            )
        },
        meta: {
            title: `LearningModule`
        }
    },

    {
        path: '/learning/module/:id/courses',
        name: "LearningCourseView",
        component: LearningCourseView,
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                '/api/learning/authenticate',
                localStorage.getItem('brace-learning-tk'),
                next,
                '/learning/login',
            )
        },
        meta: {
            title: `LearningModule`
        }
    },

    {
        path: '/learning/course/:id/view',
        name: "LearningCourseShow",
        component: LearningCourseShow,
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                '/api/learning/authenticate',
                localStorage.getItem('brace-learning-tk'),
                next,
                '/learning/login',
            )
        },
        meta: {
            title: `LearningModule`
        }
    },

    {
        path: '/learning/module/:id/assignment',
        name: "LearningModuleAssignmentView",
        component: LearningModuleAssignmentView,
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                '/api/learning/authenticate',
                localStorage.getItem('brace-learning-tk'),
                next,
                '/learning/login',
            )
        },
        meta: {
            title: `Module Assignment`
        }
    },

    {
        path: '/learning/module/:id/assessment',
        name: "LearningModuleAssessmentView",
        component: LearningModuleAssessmentView,
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                '/api/learning/authenticate',
                localStorage.getItem('brace-learning-tk'),
                next,
                '/learning/login',
            )
        },
        meta: {
            title: `Module Assignment`
        }
    },

    {
        path: '/learning/module/assessment/history',
        name: "LearningModuleAssessmentHistoryView",
        component: LearningModuleAssessmentHistoryView,
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                '/api/learning/authenticate',
                localStorage.getItem('brace-learning-tk'),
                next,
                '/learning/login',
            )
        },
        meta: {
            title: `Module Assignment`
        }
    },

    {
        path: '/learning/Account',
        name: "LearningAccountView",
        component: LearningAccountView,
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                '/api/learning/authenticate',
                localStorage.getItem('brace-learning-tk'),
                next,
                '/learning/login',
            )
        },
        meta: {
            title: `Module Assignment`
        }
    },

    {
        path: '/learning/self-help',
        name: "LearningSelfHelpView",
        component: LearningSelfHelpView,
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                '/api/learning/authenticate',
                localStorage.getItem('brace-learning-tk'),
                next,
                '/learning/login',
            )
        },
        meta: {
            title: `FAQ`
        }
    },

    {
        path: '/learning/logout',
        name: "LearningLogout",
        beforeEnter: (to, from, next) => {
            RouteService.authenticateUser(
                '/learning/logout',
                localStorage.getItem('brace-learning-tk'),
                window.location.href = '/learning/login',
                '/learning/login'
            );
            localStorage.removeItem("brace-learning-tk");
        }
    },

    {
        path: '/learning/assessment',
        name: "Assessment",
        component: () => import('../components/learning/assessments/LearningAssessmentView.vue')
    },

    {
        path: '/diagnostic/diagnostic-tool',
        name: "/DiagnosticTool",
        component: () => import('../components/learning/diagnosticQuestion/DiagnosticQuestion.vue'),
        meta: { disableBackNavigation: true },
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                '/api/learning/authenticate',
                localStorage.getItem('brace-learning-tk'),
                next,
                '/learning/login',
            )
        },
    },

    {
        path: '/diagnostic/user-details',
        name: "/UserDetails",
        component: () => import('../components/learning/diagnosticQuestion/UserDetails.vue'),
        meta: { disableBackNavigation: true },
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                '/api/learning/authenticate',
                localStorage.getItem('brace-learning-tk'),
                next,
                '/learning/login',
            )
        },
    },

    {
        path: '/diagnostic/instruction',
        name: "/Instruction",
        component: () => import('../components/learning/diagnosticQuestion/Welcomepage.vue'),
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                '/api/learning/authenticate',
                localStorage.getItem('brace-learning-tk'),
                next,
                '/learning/login',
            )
        },
    },

    {
        path: '/diagnostic/multiselectques',
        name: "/mutlitselectQues",
        component: () => import('../components/learning/diagnosticQuestion/testCheck.vue'),
        meta: { disableBackNavigation: true },
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                '/api/learning/authenticate',
                localStorage.getItem('brace-learning-tk'),
                next,
                '/learning/login',
            )
        },
    },

    {
        path: '/diagnostic/success-page',
        name: "/SuccessPage",
        component: () => import('../components/learning/diagnosticQuestion/SuccessPage.vue'),
        meta: { disableBackNavigation: true },
        beforeEnter: (to, from, next) => {
            BaseService.deleteCookies();
            RouteService.authenticateUser(
                '/api/learning/authenticate',
                localStorage.getItem('brace-learning-tk'),
                next,
                '/learning/login',
            )
        },
    },

    // {
    //     name: "AdminLayout",
    //     path: "/admin/account",
    //     component: AdminLayout,
    //
    //     children: [
    //         {
    //             name: "AdminLogin",
    //             path: "/admin/login",
    //             component: AdminLogin,
    //             meta: {
    //                 title: `Admin Login`
    //             }
    //         },
    //
    //         {
    //             name: "AdminDashboard",
    //             path: '/admin/dashboard',
    //             component: AdminLogin,
    //         },
    //
    //         {
    //             name: "AdminNominations",
    //             path: '/admin/nominations',
    //             component: AdminNominationList,
    //         },
    //
    //         {
    //             name: "AdminApplications",
    //             path: '/admin/applications',
    //             component: AdminApplicationList,
    //         },
    //
    //     ]
    // },

    // {
    //     path: "/",
    //     component: LearningDashboard,
    //     children: [
    //         {
    //             name: "dashboard",
    //             path: '/',
    //             component: Dashboard,
    //             meta: {
    //                 title: `Dashboard`
    //             }
    //         }
    //     ]
    // }

]

const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`
});
// router.beforeEach((to, from, next) => {
//     if (to.meta.disableBackNavigation) {
//       window.history.pushState(null, null, window.location.href);
//       window.onpopstate = function () {
//         window.history.go(1);
//       };
//     }
//     next();
//   });
export default router
