import { createContext, useState } from "react";

const MessageContext = createContext({
    type: null,
    text: null,
    success: () => { },
    error: () => { },
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

    return (
        <MessageContext.Provider value={{ type, text, success, error }}>
            {props.children}
        </MessageContext.Provider>
    );

}

export { MessageProvider };

export default MessageContext;
