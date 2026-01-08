// resources/js/types/index.d.ts

export interface AuthUser {
    id: number;
    f_name: string;
    l_name: string;
    email: string;
    role: string | null;
    dashboard_url: string | null;
}

export interface Auth {
    user: AuthUser | null;
}

// export type AppPageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
//     name: string;
//     quote: {
//         message: string;
//         author: string;
//     };
//     auth: Auth;
// };
