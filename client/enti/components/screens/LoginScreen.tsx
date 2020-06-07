import React from 'react';
import {View, Text} from 'react-native';
import {Input, Button} from 'react-native-elements';
import {Screen} from '../common/Screen';
import {ECard} from '../common/Card';
import {RootStackParamList} from '../../App';
import {StackNavigationProp} from '@react-navigation/stack';

type LoginScreenNavigationProp = StackNavigationProp<RootStackParamList,'Login'>;

interface Props {
    navigation: LoginScreenNavigationProp
}

const LoginScreen = (props: Props) => {
    const {navigation} = props;
    return (
        <Screen>
            <Text>Enti</Text>
            <ECard title='Please login'>
                <View>
                    <Input placeholder='Please enter your email' leftIcon={{name:'email', type:'material'}} />
                    <Input placeholder='Password' secureTextEntry={true} leftIcon={{name:'lock', type:'material'}} />
                </View>
                <View>
                    <Button title='Forgot password' type='clear' />
                    <Button type='clear' title='Create account' onPress={() =>
                        navigation.navigate('SignUp')
                    }/>
                </View>
            </ECard>
        </Screen>
    )
}

export {LoginScreen}

