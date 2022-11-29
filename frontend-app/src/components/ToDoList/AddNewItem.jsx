import { useContext, useRef } from "react";
import { useDispatch } from "react-redux";
import { addItem } from "../../store/ToDoSlice";
import MessageContext from "../../context/MessageContext";

const AddNewItems = () => {
    const input = useRef('');
    const myCtx = useContext(MessageContext);
    const dispatch = useDispatch();

    const add = (e) => {
        //отменяет обработчик события по умолчанию
        e.preventDefault();

        if (input.current.value === '') {
            myCtx.error('Input is empty!');
            return;
        }

        dispatch(addItem(input.current.value));
        input.current.value = '';
        input.current.blur();
        myCtx.success('Item was addad!');
    };

    return (
        <form className="input-group" onSubmit={add}>
            <input ref={input} type="text" className="form-control" />
            <div className="input-group-append">
                <button className="input-group-text">Add</button>
            </div>
        </form>
    );

};

export default AddNewItems;