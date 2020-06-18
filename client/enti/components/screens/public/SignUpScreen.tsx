import React, {useContext} from 'react';
import {View} from 'react-native';
import {Input, Button} from 'react-native-elements';
import {Screen} from '../../common/Screen';
import {ECard} from '../../common/Card';
import axios from 'axios';
import {Formik} from 'formik';
import {AuthContext} from '../../../auth/AuthContext';
import {FormikInput} from '../../common/FormikInput';
import {object as YupObject, string as YupString, ref as YupRef} from 'yup'
import {FormikButton} from '../../common/FormikButton';

const validationSchema = YupObject().shape({
    firstName: YupString().required('Please provide a first name'),
    lastName: YupString().required('Please provide a last name'),
    email: YupString().required('Please provide a valid email'),
    password: YupString().required('Password is required'),
    verifiedPassword: YupString().oneOf([YupRef('password')], "Passwords don't match").required('Confirm Password is required'),
});

interface FormikValues {firstName: string, lastName: string, email: string, password: string, verifiedPassword: string}

export const SignUpScreen = () => {
    const value = useContext(AuthContext);

    const submit = (values: FormikValues) => {
        value?.authDispatch.signUp(values)
    }

    const initialValues = {firstName: '', lastName: '', email: '', password: '', verifiedPassword: ''}

    return(
        <Screen>
            <ECard title='Sign up'>
                <View>
                    <Formik initialValues={initialValues} validationSchema={validationSchema} onSubmit={submit}>
                        {({ handleSubmit }) => (
                            <>
                                <FormikInput placeholder='First name' name='firstName'/>
                                <FormikInput placeholder='Last name'  name='lastName'/>
                                <FormikInput placeholder='Please enter your email' name='email'/>
                                <FormikInput placeholder='Choose password' name='password'/>
                                <FormikInput placeholder='Verify password' secureTextEntry={true} name='verifiedPassword'/>
                                <FormikButton title='Sign up' type='solid' />
                    </>
                            )}
                    </Formik>
                </View>
            </ECard>
        </Screen>
    )
};
