import { createContext, useState } from "react";

const MessageContext = createContext({
    type: null,
    text: null,
    success: () => { },
    error: () => { },
    ligth: () => { },
});

const MessageProvider = (props) => {
    const [type, setType] = useState(null);
    const [text, setText] = useState(null);

    const success = (msg) => {
        setType('success');
        setText(msg);
    }

    const error = (msg) => {
        setType('error');
        setText(msg);
    }

    const ligth = () => {
        setType('ligth');
        setText('');
    }

    return (
        <MessageContext.Provider value={{ type, text, success, error, ligth }}>
            {props.children}
        </MessageContext.Provider>
    );

}

export { MessageProvider };

export default MessageContext;
