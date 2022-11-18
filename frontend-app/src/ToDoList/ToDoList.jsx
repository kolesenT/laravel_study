import { render } from "@testing-library/react";
import { useContext, useEffect, useRef, useState } from "react";
import MessageContext from "../context/MessageContext";
import './ToDoList.css';

function ToDoList({ save = () => { }, load = () => { } }) {
    const input = useRef('');
    const [items, setItems] = useState(JSON.parse(load()) ?? []);
    const myCtx = useContext(MessageContext);

    useEffect(() => {
        save(JSON.stringify(items))
    }, [items]);

    const addItem = (e) => {
        //отменяет обработчик события по умолчанию
        e.preventDefault();

        if (input.current.value === '') {
            myCtx.error('Input is empty!');
            return;
        }

        const newItem = [...items, { value: input.current.value, isDone: false }];
        setItems(newItem);


        input.current.value = '';
        input.current.blur();
        myCtx.success('Item was addad!');
    }

    const toggleDone = (index) => {
        const newItem = [...items];

        newItem[index].isDone = !newItem[index].isDone;

        setItems(newItem);
    }

    const toggleDel = (index) => {
        const newItem = items.filter((_, i) => i !== index);

        setItems(newItem);
        myCtx.success('Item was deleted!');
    }

    const deleteAll = () => {
        setItems([])
        myCtx.ligth();
    }

    return (
        <div className="container">
            <h1 className="text-center">Shopping List</h1>
            <div className="lg-6 md-8 sm-10 justify-content-center">
                <form className="input-group" onSubmit={addItem}>
                    <input ref={input} type="text" className="form-control" />
                    <div className="input-group-append">
                        <button className="input-group-text">Add</button>
                    </div>
                </form>
                <button onClick={deleteAll} class="btn btn-primary me-md-2" type="button">Delete all</button>
                <div className="my-3 p-3">
                    <ul className="list-group">
                        {items.map((item, index) =>
                            <Item key={index}
                                value={item.value}
                                isDone={item.isDone}
                                toggle={() => toggleDone(index)}
                                del={() => toggleDel(index)} />)}
                    </ul>
                </div>
            </div>
        </div>
    )

}

function Item({ value, isDone, toggle, del }) {
    return (
        <li className="list-group-item">
            <input onChange={toggle} checked={isDone} className="form-check-input me-1" type="checkbox" />
            <span>
                {value}
            </span>
            <button onClick={del} className="btn-trash btn-sm">
                delete
            </button>
        </li>
    );
}

export default ToDoList;