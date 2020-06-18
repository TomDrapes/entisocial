import React, {memo} from 'react'
import {Button, ButtonProps} from 'react-native-elements';
import {useFormikContext} from 'formik';

export const FormikButton = memo((props: ButtonProps) => {
    const {handleSubmit} = useFormikContext();
    return (
        <Button onPress={() => handleSubmit()} {...props} />
    )
});