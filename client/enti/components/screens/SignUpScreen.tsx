import React from 'react';
import {View} from 'react-native';
import {Input} from 'react-native-elements';
import {Screen} from '../common/Screen';
import {ECard} from '../common/Card';

export const SignUpScreen = () => (
        <Screen>
            <ECard title='Sign up'>
                <View>
                    <Input placeholder='Please enter your email' leftIcon={{name:'email', type:'material'}} />
                    <Input placeholder='Choose password' secureTextEntry={true} leftIcon={{name:'lock', type:'material'}} />
                    <Input placeholder='Verify password' secureTextEntry={true} leftIcon={{name:'lock', type:'material'}} />
                </View>
            </ECard>
        </Screen>
);