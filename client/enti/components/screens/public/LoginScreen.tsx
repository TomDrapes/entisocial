import React, {memo, useContext, useMemo} from 'react';
import {View, Text} from 'react-native';
import {Input, Button} from 'react-native-elements';
import {Screen} from '../../common/Screen';
import {ECard} from '../../common/Card';
import {CustomThemeContext} from '../../../theme/CustomThemeContext';
import { useNavigation } from '@react-navigation/native';
import {Formik} from 'formik';
import {object as YupObject, string as YupString, ref as YupRef} from 'yup'
import {FormikInput} from '../../common/FormikInput';
import {FormikSubmitButton} from '../../common/FormikSubmitButton';
import {AuthContext} from '../../../auth/AuthContext';

const validationSchema = YupObject().shape({
    email: YupString().required('Please provide a valid email'),
    password: YupString().required('Password is required'),
});

const LoginScreen = memo(() => {
    const navigation = useNavigation();
    const {theme} = useContext(CustomThemeContext);
    const value = useContext(AuthContext);

    const initialValues = useMemo(() => ({email: '', password: ''}), []);

    const handleSubmit = (values: {email: string, password: string}) => {
        value?.authDispatch.signIn(values);
    };

    return (
        <Screen>
            <Text>Enti</Text>
            <ECard title='Please login'>
                <Formik initialValues={initialValues} validationSchema={validationSchema} onSubmit={handleSubmit}>
                    <>
                    <View>
                        <FormikInput name='email' placeholder='Please enter your email' leftIcon={{name:'email', type:'material', solid: true}} />
                        <FormikInput name='password' placeholder='Password' secureTextEntry={true} leftIcon={{name:'lock', type:'material'}} />
                        <FormikSubmitButton title='Submit' type='solid' />
                    </View>
                    <View>
                        <Button title='Forgot password' type='clear' titleStyle={{color: theme.secondaryText}}/>
                        <Button type='clear' title='Create account' onPress={() => navigation.navigate('SignUp')} />
                    </View>
                        </>
                </Formik>
            </ECard>
        </Screen>
    )
})

export {LoginScreen}

