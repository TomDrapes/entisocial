import React, {useContext} from 'react';
import {View, Text} from 'react-native';
import {Input, Button} from 'react-native-elements';
import {Screen} from '../../common/Screen';
import {ECard} from '../../common/Card';
import {CustomThemeContext} from '../../../theme/CustomThemeContext';
import { useNavigation } from '@react-navigation/native';

const LoginScreen = () => {
    const navigation = useNavigation();
    const {theme} = useContext(CustomThemeContext);
    return (
        <Screen>
            <Text>Enti</Text>
            <ECard title='Please login'>
                <View>
                    <Input placeholder='Please enter your email' leftIcon={{name:'email', type:'material', solid: true}} />
                    <Input placeholder='Password' secureTextEntry={true} leftIcon={{name:'lock', type:'material'}} />
                </View>
                <View>
                    <Button title='Forgot password' type='clear' titleStyle={{color: theme.secondaryText}}/>
                    <Button type='clear' title='Create account' onPress={() =>
                        navigation.navigate('SignUp')
                    }/>
                </View>
            </ECard>
        </Screen>
    )
}

export {LoginScreen}

