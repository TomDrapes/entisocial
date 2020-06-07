import 'react-native-gesture-handler';
import React from 'react';
import { NavigationContainer } from '@react-navigation/native';
import {createStackNavigator} from '@react-navigation/stack';
import {LoginScreen} from './components/screens/LoginScreen';
import {SignUpScreen} from './components/screens/SignUpScreen';
import {customTheme, CustomThemeProvider} from './theme/CustomThemeContext';

export type RootStackParamList = {
    Login: undefined;
    SignUp: undefined;
};

const RootStack = createStackNavigator<RootStackParamList>();

export default function App() {
  return (
      <CustomThemeProvider value={customTheme}>
          <NavigationContainer>
              <RootStack.Navigator>
                  <RootStack.Screen name="Login" component={LoginScreen} />
                  <RootStack.Screen name="SignUp" component={SignUpScreen} />
              </RootStack.Navigator>
          </NavigationContainer>
      </CustomThemeProvider>
  );
}