import React, {useContext} from 'react';
import {View} from 'react-native';
import {Input, Button} from 'react-native-elements';
import {Screen} from '../../common/Screen';
import {ECard} from '../../common/Card';
import axios from 'axios';
import {Formik} from 'formik';
import {AuthContext} from '../../../auth/AuthContext';

interface InitialValues {firstName: string, lastName: string, email: string, password: string, verifiedPassword: string}

export const SignUpScreen = () => {
    const value = useContext(AuthContext);

    const submit = (values: InitialValues) => {
        console.log(values)
        const formData = new FormData();
        formData.append('firstName', values.firstName);
        formData.append('lastName', values.lastName);
        formData.append('email', values.email);
        formData.append('password', values.password);
        axios.post('http://localhost:8080/api/register', formData).then(res => {
            console.log(res)
        })
    }
    return(
        <Screen>
            <ECard title='Sign up'>
                <View>
                    <Formik initialValues={{firstName: '', lastName: '', email: '', password: '', verifiedPassword: ''}} onSubmit={submit}>
                        {({ handleChange, handleBlur, handleSubmit, values }) => (
                            <>
                                <Input placeholder='First name' value={values.firstName} onBlur={handleBlur('firstName')} onChangeText={handleChange('firstName')}/>
                                <Input placeholder='Last name'  value={values.lastName} onBlur={handleBlur('lastName')} onChangeText={handleChange('lastName')}/>
                                <Input placeholder='Please enter your email' leftIcon={{name:'email', type:'material'}} value={values.email} onBlur={handleBlur('email')} onChangeText={handleChange('email')}/>
                                <Input placeholder='Choose password' secureTextEntry={true} leftIcon={{name:'lock', type:'material'}} value={values.password} onBlur={handleBlur('password')} onChangeText={handleChange('password')}/>
                                <Input placeholder='Verify password' secureTextEntry={true} leftIcon={{name:'lock', type:'material'}} value={values.verifiedPassword} onBlur={handleBlur('verifiedPassword')} onChangeText={handleChange('verifiedPassword')}/>
                                <Button title='Sign up' type='solid' onPress={() => handleSubmit()} />
                    </>
                            )}
                    </Formik>
                </View>
            </ECard>
        </Screen>
    )
};
