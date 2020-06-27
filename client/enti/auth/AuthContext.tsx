import React, {Dispatch, ReactNode, useMemo} from 'react';
import axios from 'axios';

interface SignupDetails {
firstName: string, lastName: string, email: string, password: string
}

interface SignInDetails {
    email: string;
    password: string;
}

type AuthAction = 'RESTORE_TOKEN' | 'SIGN_IN' | 'SIGN_OUT';

interface AuthDispatch {
    signIn: (x: any) => Promise<void>,
    signOut: () => void,
    signUp: (x: SignupDetails) => Promise<void>,

}

interface AuthState {
    isLoading: boolean,
    isSignout: false,
    userToken: string | null
}


interface AuthContextState {
    authState: AuthState,
    authDispatch: AuthDispatch
}

const AuthContext = React.createContext<AuthContextState | undefined>(undefined);

interface Props {
    children: ReactNode;
}
const AuthProvider = (props: Props) => {

    const [state, dispatch] = React.useReducer(
        (prevState: any, action: { type: AuthAction; token?: string; }) => {
            switch (action.type) {
                case 'RESTORE_TOKEN':
                    return {
                        ...prevState,
                        userToken: action.token,
                        isLoading: false,
                    };
                case 'SIGN_IN':
                    return {
                        ...prevState,
                        isSignout: false,
                        userToken: action.token,
                    };
                case 'SIGN_OUT':
                    return {
                        ...prevState,
                        isSignout: true,
                        userToken: null,
                    };
            }
        },
        {
            isLoading: true,
            isSignout: false,
            userToken: null,
        }
    );

    const authDispatch = useMemo(() => (
        {
            signIn: async (data: SignInDetails) => {
                // In a production app, we need to send some data (usually username, password) to server and get a token
                // We will also need to handle errors if sign in failed
                // After getting token, we need to persist the token using `AsyncStorage`
                // In the example, we'll use a dummy token
                const formData = new FormData();
                formData.append('email', data.email);
                formData.append('password', data.password);
                console.log('POST')
                axios.post('http://localhost:8080/api/login', formData).then(res => {
                    console.log(res)
                    if (res.status === 200) {
                        dispatch({ type: 'SIGN_IN', token: 'dummy-auth-token' });
                    }
                }).catch(e => console.log(e))

            },
            signOut: () => dispatch({ type: 'SIGN_OUT' }),
            signUp: async (data: SignupDetails) => {
                // In a production app, we need to send user data to server and get a token
                // We will also need to handle errors if sign up failed
                // After getting token, we need to persist the token using `AsyncStorage`
                // In the example, we'll use a dummy token

                const formData = new FormData();
                formData.append('firstName', data.firstName);
                formData.append('lastName', data.lastName);
                formData.append('email', data.email);
                formData.append('password', data.password);
                axios.post('http://localhost:8080/api/register', formData).then(res => {
                    console.log(res)
                })

                // dispatch({ type: 'SIGN_IN', token: 'dummy-auth-token' });
            },
        }
        ), []);

    const value = {
        authState: state,
        authDispatch: authDispatch
    };
    return <AuthContext.Provider value={value} children={props.children} />
}

export {AuthProvider, AuthContext}
