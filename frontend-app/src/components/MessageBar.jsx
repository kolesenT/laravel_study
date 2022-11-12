import { useContext } from "react";
import MessageContext from "../context/MessageContext";

const MessageBar = () => {
    const myCtx = useContext(MessageContext);

    if (myCtx === null) {
        return;
    }

    return (
        <div className={`alert alert-${myCtx}`}>
            {myCtx.text}
        </div>
    );
};

export default MessageBar;