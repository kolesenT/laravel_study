import { createSlice } from "@reduxjs/toolkit";

const ToDoSlice = createSlice({
    name: 'todo',
    initialState: {
        todo: []
    },
    reducers: {
        addItem: (state, action) => {
            state.todo.push({ title: action.payload, isDone: false });
        },
        toggleDone: (state, action) => {
            state.todo = state.todo.map((value, index) => {
                if (index === action.payload) {
                    return { ...value, isDone: !value.isDone };
                }
                return value;
            });
        },
        toggleDel: (state, action) => {
            state.todo = state.todo.filter((_, index) => index !== action.payload);
        },
        delAll: (state) => {
            console.log(state);
            state.todo = [];
        },
    },
});

export default ToDoSlice.reducer;

export const { addItem, toggleDone, toggleDel, delAll } = ToDoSlice.actions;
export const getAllItems = state => state.items.todo;