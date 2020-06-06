import React from 'react';
import { StyleSheet, Text, View } from 'react-native';
import {Card, Input} from 'react-native-elements';

export default function App() {
  return (
    <View style={styles.container}>
      <Text>Enti</Text>
        <Card title='Please login' containerStyle={styles.loginCard}>
            <View>
                <Input placeholder='Please enter your email' leftIcon={{name:'email', type:'material'}} />
                <Input placeholder='Password' secureTextEntry={true} leftIcon={{name:'lock', type:'material'}} />
            </View>
        </Card>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fbe8a3',
    alignItems: 'center',
    justifyContent: 'center',
      padding: 16
  },
    loginCard: {
      width: '100%',
        opacity: 0.7,
        borderRadius: 8
    }
});
