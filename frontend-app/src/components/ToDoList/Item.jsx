import { useContext } from "react";
import { useDispatch } from "react-redux";
import MessageContext from "../../context/MessageContext";
import { toggleDel, toggleDone } from "../../store/ToDoSlice";

const Item = ({ id, value, isDone }) => {
    const myCtx = useContext(MessageContext);
    const dispatch = useDispatch();

    const del = () => {
        dispatch(toggleDel(id));
        myCtx.success('Item was deleted!');
    }

    return (
        <li className="list-group-item">
            <input onChange={() => dispatch(toggleDone(id))} checked={isDone} className="form-check-input me-1" type="checkbox" />
            <span>
                {value}
            </span>
            <button onClick={del} className="btn-trash btn-sm">
                delete
            </button>
        </li>
    );

};

export default Item;